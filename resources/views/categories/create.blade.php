@extends('layouts.dashboard')
@section( 'page-title','Create Category')       
@section('content')


        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <form action="/categories" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            @include('categories._form')

        </form>
@endsection
