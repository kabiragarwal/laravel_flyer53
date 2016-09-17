@extends('layouts.app')

@section('content')
<h1>Selling Your Home?</h1>
<hr>

    @if(count($errors))
    <ul class="alert-danger list-group">
        @foreach($errors->all() as $error)
        <li class="list-group-item">{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form method="post" action="{{url('flyers')}}" enctype="multipart/form-data">
        @include('partials.form')
    </form>

@endsection