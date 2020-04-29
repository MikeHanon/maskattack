@extends('layouts.app')
@section('content')

    <img src="{{asset($product[0]['image'])}}" alt="{{$product[0]['name']}}" width="250px">


    @foreach($product[0]['categories'] as $key => $item)
        <span class="badge badge-info">{{ $item->name }}</span>
    @endforeach
    <p>{{$product[0]['ville']}}</p>
    <p>{{$product[0]['price']}} €</p>

    <h1>{{$product[0]['name']}}</h1>

    <p>{{$product[0]['user_name']}}</p>

    <form id="editOrder" action="{{ route('orders.update', $order->id) }}" method="POST" style="">
        @method('PUT')
        @csrf
        <select name="quantity" id="quantity">--}}
            @for ($i=0; $i <= $quantity; $i++)
                <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>
        <button class="btn btn-success" type="submit">commander</button>
        {{ csrf_field() }}
    </form>

@endsection
@section('scripts')

@endsection
