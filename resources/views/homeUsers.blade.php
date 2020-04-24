@extends('layouts.app')

@include('partials.menuUsers')
@section('content')
    <div id="app">
        <example-component></example-component>
     </div>
@endsection
@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
@endsection
