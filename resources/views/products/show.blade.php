@extends('layouts.app')
@section('content')
    <img src="{{asset($product->image)}}" alt="{{$product->name}}" width="250px">


    @foreach($product->categories as $key => $item)
        <span class="badge badge-info">{{ $item->name }}</span>
    @endforeach
    <p>{{$product->ville}}</p>
    <p>{{$product->price}} €</p>

    <h1>{{$product->name}}</h1>

    <p>{{$product->user_name}}</p>

    <form id="addOrder" action="{{ route('product.order.addOrder', $product->id) }}" method="POST" style="">
        <select name="quantity" id="quantity">--}}
                @for ($i=0; $i <= $product->quantity; $i++)
                <option value="{{$i}}">{{$i}}</option>
                    @endfor
            </select>
            <button class="btn btn-success" type="submit">commander</button>
            {{ csrf_field() }}
        </form>


    @endsection
