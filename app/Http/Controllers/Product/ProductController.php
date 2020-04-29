<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Order;
use App\Product;
use App\ProductCategory;
use App\ProductTag;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use App\Events\newOrder;

class ProductController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products', 'user'));
    }

    public function create()
    {


        $categories = ProductCategory::all()->pluck('name', 'id');


        $tags = ProductTag::all()->pluck('name', 'id');

        return view('products.create', compact('categories', 'tags'));
    }

    public function store(StoreProductRequest $request)
    {

        $userId = Auth::user()->id;
        $userName = Auth::user()->name;
        $imageName = time().'.'.$request->images->extension();
        $data = $request->request->add([
            'user_id' => $userId,
            'image' => 'images/product/'.$imageName,
            'user_name' => $userName,
        ]);




        $request->images->move(public_path('images/product'), $imageName);

        $product = Product::create($request->all());
        $product->categories()->sync($request->input('categories', []));
        $product->tags()->sync($request->input('tags', []));


        return redirect()->route('admin.products.index');

    }

    public function edit(Product $product)
    {


        $categories = ProductCategory::all()->pluck('name', 'id');

        $tags = ProductTag::all()->pluck('name', 'id');

        $product->load('categories', 'tags');

        return view('products.edit', compact('categories', 'tags', 'product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        $product->categories()->sync($request->input('categories', []));
        $product->tags()->sync($request->input('tags', []));

        if ($request->input('photo', false)) {
            if (!$product->photo || $request->input('photo') !== $product->photo->file_name) {
                $product->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }

        } elseif ($product->photo) {
            $product->photo->delete();
        }

        return redirect()->route('product.products.myProducts');

    }

    public function show(Product $product)
    {


        $product->load('categories', 'tags');

        return view('products.show', compact('product'));
    }

    public function destroy(Product $product)
    {


        $product->delete();

        return back();

    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

    public function storeCKEditorImages(Request $request)
    {


        $model         = new Product();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);

    }
    public function addOrder(Request $request,$id)
    {
        $product= Product::find($id);

        $userId = Auth::user()->id;

        Order::create([
            'user_id'       => $userId,
            'to_user_id'    => $product->user_id,
            'product_id'    => $product->id,
            'name'          => $product->name,
            'description'   => $product->description,
            'price'         => ($product->price * $request->input('quantity')),
            'quantity'      => $request->input('quantity'),
            'validated'     =>  "false"
        ]);
        $newQuantity = $product->quantity - $request->input('quantity');
        $product->update(['quantity' => $newQuantity]);



        if($product->quantity == 0){
            $product->update(['disponibility' => 0]);
            return redirect()->back()->with('success', 'Produit ajouter au panier');
        }

        return redirect()->back()->with('success', 'Produit ajouter au panier');

    }

    public function myProducts()
    {

        $userId= Auth::user()->id;
        $products = Product::where('user_id', $userId)->get();


        return view('products.myProducts',compact('products'));

    }

}
