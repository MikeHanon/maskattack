<?php

namespace App\Http\Controllers\Admin;

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
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ProductCategory::all()->pluck('name', 'id');


        $tags = ProductTag::all()->pluck('name', 'id');

        return view('admin.products.create', compact('categories', 'tags'));
    }

    public function store(StoreProductRequest $request)
    {
        $userId = Auth::user()->id;
       $data = $request->request->add(['user_id' => $userId]);

        $product = Product::create($request->all());
        $product->categories()->sync($request->input('categories', []));
        $product->tags()->sync($request->input('tags', []));

        if ($request->input('photo', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $product->id]);
        }

        return redirect()->route('admin.products.index');

    }

    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ProductCategory::all()->pluck('name', 'id');

        $tags = ProductTag::all()->pluck('name', 'id');

        $product->load('categories', 'tags');

        return view('admin.products.edit', compact('categories', 'tags', 'product'));
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

        return redirect()->route('admin.products.index');

    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('categories', 'tags');

        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        abort_if(Gate::denies('product_create') && Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        $email = User::where('id', $product->user_id)->get()->toArray();
        Order::create([
            'user_id'       => $userId,
            'to_user_id'    => $product->user_id,
            'product_id'    => $product->id,
            'name'          => $product->name,
            'description'   => $product->description,
            'price'         => ($product->price * $product->quantity),
            'quantity'      => $request->input('quantity'),
            'validated'     =>  "false"
        ]);
        $newQuantity = $product->quantity - $request->input('quantity');
        $product->update(['quantity' => $newQuantity]);

        Mail::send('mailOrder', [
            'name'      => $request->get('name'),
            'email'     =>'$email[0][\'email\']',
            'subject'   => 'nouvelle commande sur Maskattack',
            'user_message'=> 'vous avez une nouvelle commande sur Maskattack merci de vous connecter pour valider',
        ], function ($message) use ($email){

            $message->from('info@maskattack.be');
            $message->to( $email[0]['email']);
        });

        if($product->quantity == 0){
            $product->update(['disponibility' => 0]);
            return redirect()->route('admin.products.index');
        }

        return redirect()->back()->with('success', 'Produit ajouter au panier');

    }

    public function myProducts()
    {

        $userId= Auth::user()->id;
        $products = Product::where('user_id', $userId)->where('disponibilty', 1)->get();


        return view('admin.products.myProducts',compact('products'));

    }

}
