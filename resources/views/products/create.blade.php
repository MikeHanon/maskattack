@extends('layouts.app')
@section('content')


        <form method="POST" action="{{ route("product.products.store") }}" enctype="multipart/form-data">
            @csrf
            <div >
                <label  for="name">{{ trans('cruds.product.fields.name') }}</label>
                <input  type="text" name="name" id="name" value="{{ old('name', '') }}" required>

                <span >{{ trans('cruds.product.fields.name_helper') }}</span>
            </div>
            <div>
                <label for="description">{{ trans('cruds.product.fields.description') }}</label>
                <textarea  name="description" id="description">{{ old('description') }}</textarea>

                <span >{{ trans('cruds.product.fields.description_helper') }}</span>
            </div>
            <div >
                <label  for="ville">{{ trans('cruds.product.fields.city') }}</label>
                <input  type="text" name="ville" id="ville" value="{{ old('ville', '') }}" required>

                <span >{{ trans('cruds.product.fields.city_helper') }}</span>
            </div>
            <div >
                <label  for="price">{{ trans('cruds.product.fields.price') }}</label>
                <input type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>

                <span>{{ trans('cruds.product.fields.price_helper') }}</span>
            </div>
            <div >
                <label  for="price">{{ trans('cruds.product.fields.quantity') }}</label>
                <input  type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" step="0.01" required>
                @
                <span>{{ trans('cruds.product.fields.quantity_helper') }}</span>
            </div>
            <div >
                <label for="categories">{{ trans('cruds.product.fields.category') }}</label>
                <div>
                    <span >{{ trans('global.select_all') }}</span>
                    <span >{{ trans('global.deselect_all') }}</span>
                </div>
                <select name="categories[]" id="categories" multiple>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ in_array($id, old('categories', [])) ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>

                <span>{{ trans('cruds.product.fields.category_helper') }}</span>
            </div>
                <select name="tags[]" id="tags" multiple>
                    @foreach($tags as $id => $tag)
                        <option value="{{ $id }}" {{ in_array($id, old('tags', [])) ? 'selected' : '' }}>{{ $tag }}</option>
                    @endforeach
                </select>

                <span>{{ trans('cruds.product.fields.tag_helper') }}</span>
            </div>
            <div>
                <label for="photo">{{ trans('cruds.product.fields.photo') }}</label>
                <div  id="photo-dropzone">
                </div>

                <span class="help-block">{{ trans('cruds.product.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')

@endsection
