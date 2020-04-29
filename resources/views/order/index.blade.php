@extends('layouts.app')
@section('content')

    @foreach($orders as $order)
        <h1>{{$order->name}}</h1>
        <p>{{$order->description}}</p>
        <p>{{$order->price}}</p>
        <p>{{$order->quantity}}</p>
@if($order->validated == 0)
        <form action="{{route('order.accept-order', $order->id)}}" method="post">
            <input type="hidden" name="validated" value="1">
            <button class="btn btn-success" type="submit">{{trans('global.confirm')}} {{trans('global.order')}}</button>
            {{ csrf_field() }}
        </form>
        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="btn  btn-danger" value="{{ trans('global.delete') }} {{trans('global.order')}}">
        </form>
    <a class="btn btn-info" href="{{route('orders.edit', $order->id)}}">{{trans('global.edit')}}</a>
        @else
    <p>commande confirmée le vendeur prendra contact avec vous</p>
    @endif

    @endforeach
@endsection
@section('scripts')

@endsection
