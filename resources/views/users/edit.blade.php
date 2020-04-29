@extends('layouts.app')
@section('content')
    <div class="container">
    <form action="{{route('profile.users.update', $user->id)}}" method="post">
        @method('PUT')
        @csrf
        <label for="name">{{trans('cruds.user.fields.name')}}</label>
        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ $user->name}}" required>
        <label for="first-name">{{trans('cruds.metaUser.fields.First_name')}}</label>
        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="first-name" id="first-name" value="{{ $metaUser[0]['First_name']}}" required>
        <label for="last-name">{{trans('cruds.metaUser.fields.Last_name')}}</label>
        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="last-name" id="last-name" value="{{ $metaUser[0]['Last_name']}}" required>
        <label for="Ville">{{trans('cruds.metaUser.fields.ville')}}</label>
        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="ville" id="ville" value="{{ $metaUser[0]['Ville']}}" required>
        <label for="email">{{trans('cruds.user.fields.email')}}</label>
        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="email" id="ville" value="{{ $user->email}}" required>

        <button class="btn btn-success" type="submit">sauvegarder</button>
    </form>
    </div>
    <div class="container">
    <form method="POST" action="{{ route("profile.password.update") }}">
        @csrf
        <div class="form-group">
            <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required>
            @if($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label class="required" for="password">New {{ trans('cruds.user.fields.password') }}</label>
            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
            @if($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label class="required" for="password_confirmation">Repeat New {{ trans('cruds.user.fields.password') }}</label>
            <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <div class="form-group">
            <button class="btn btn-danger" type="submit">
                {{ trans('global.save') }}
            </button>
        </div>
    </form>
    </div>


@endsection
