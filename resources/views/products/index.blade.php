@extends('layouts.app')
@section('content')
    @foreach($products as $product)
        <img src="{{asset($product->image)}}" alt="{{$product->name}}" width="250px">


        @foreach($product->categories as $key => $item)
            <span class="badge badge-info">{{ $item->name }}</span>
        @endforeach
        <p>{{$product->ville}}</p>
        <p>{{$product->price}} €</p>

        <h1>{{$product->name}}</h1>

        <p>{{$product->quantity}}</p>
        <p>{{$product->user_name}}</p>
@endforeach


@endsection
@section('scripts')
@parent

@endsection
