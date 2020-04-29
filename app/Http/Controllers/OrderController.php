<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId= Auth::user()->id;
        $orders = Order::where('user_id', $userId)->get();
        return view('order.index', compact('orders'));
    }

    public function myOrder()
    {
        $userId= Auth::user()->id;
        $orders = Order::where('to_user_id', $userId)->where('validated','=','1')->get();
        return view('order.myOrder', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Order::create($request->all());
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $product = Product::where('id', $order->product_id)->get();

        $quantity = ($product->toArray()[0]['quantity'] + $order->quantity);

        return view('order.edit', compact('order', 'product', 'quantity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        $product = Product::where('id', $order->product_id);

        $quantity =(($product->get('quantity')->toArray()[0]['quantity'] + $order->quantity)- $request->quantity);
        $product->update(['quantity'=> $quantity]);

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }

    public function acceptOrder(Request $request, Order $order)
    {

        $order->update($request->all());
        $email = User::where('id', $order->to_user_id)->get()->toArray();
        $name = User::where('id', $order->user_id)->get()->toArray();

        Mail::send('mailOrder', [
            'name'      => $name[0]['name'],
            'userName'      => $email[0]['name'],
            'productName'   =>$order->name,
            'quantity' => $order->quantity,
            'email'     =>$email[0]['email'],
            'subject'   => 'nouvelle commande sur Maskattack',
        ], function ($message) use ($email){

            $message->from('info@maskattack.be');
            $message->to( $email[0]['email']);
        });

       return redirect()->back()->with('success', 'commande validée');

    }
}
