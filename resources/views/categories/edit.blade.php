@extends('layouts.dashboard')
@section( 'page-title','Edit Category')       
@section('content')

        <form action="/categories/{{$category->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('categories._form')
        </form>
@endsection
