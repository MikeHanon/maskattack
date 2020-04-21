@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.metaUser.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.meta-users.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="user">{{ trans('cruds.metaUser.fields.user') }}</label>
                <input class="form-control {{ $errors->has('user') ? 'is-invalid' : '' }}" type="number" name="user" id="user" value="{{ old('user', '') }}" step="1">
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.metaUser.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.metaUser.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.metaUser.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="adresse">{{ trans('cruds.metaUser.fields.adresse') }}</label>
                <input class="form-control {{ $errors->has('adresse') ? 'is-invalid' : '' }}" type="text" name="adresse" id="adresse" value="{{ old('adresse', '') }}" required>
                @if($errors->has('adresse'))
                    <span class="text-danger">{{ $errors->first('adresse') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.metaUser.fields.adresse_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="acount_nbr">{{ trans('cruds.metaUser.fields.acount_nbr') }}</label>
                <input class="form-control {{ $errors->has('acount_nbr') ? 'is-invalid' : '' }}" type="text" name="acount_nbr" id="acount_nbr" value="{{ old('acount_nbr', '') }}" required>
                @if($errors->has('acount_nbr'))
                    <span class="text-danger">{{ $errors->first('acount_nbr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.metaUser.fields.acount_nbr_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone_number">{{ trans('cruds.metaUser.fields.phone_number') }}</label>
                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}" required>
                @if($errors->has('phone_number'))
                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.metaUser.fields.phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="paypal">{{ trans('cruds.metaUser.fields.paypal') }}</label>
                <input class="form-control {{ $errors->has('paypal') ? 'is-invalid' : '' }}" type="text" name="paypal" id="paypal" value="{{ old('paypal', '') }}">
                @if($errors->has('paypal'))
                    <span class="text-danger">{{ $errors->first('paypal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.metaUser.fields.paypal_helper') }}</span>
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