@extends('layouts.app')
@section('content')
    <a class="btn btn-success" href="{{route('product.products.create')}}">{{ trans('global.add') }} {{ trans('cruds.product.title_singular') }}</a>
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
        <td>

                <a class="btn btn-xs btn-primary" href="{{ route('admin.products.show', $product->id) }}">
                    {{ trans('global.view') }}
                </a>



                <a class="btn btn-xs btn-info" href="{{ route('admin.products.edit', $product->id) }}">
                    {{ trans('global.edit') }}
                </a>



                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                </form>
          

        </td>
    @endforeach


@endsection
@section('scripts')
    @parent

@endsection
