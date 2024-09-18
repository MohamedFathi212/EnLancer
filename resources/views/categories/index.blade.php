@extends('layouts.dashboard')
@section('content')

@section( 'page-title','Categories')


   @if($flashMessage)
        <div class="alert alert-success">
                {{$flashMessage}}
        </div>
   @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="/categories/create" class="btn btn-primary btn-lg">Create New Category</a>
    </div>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Parent ID</th>
                <th>Created At</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Show</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="/categories/{{$category->id}}" class="text-decoration-none">{{$category->name}}</a></td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->parent_id}}</td>
                    <td>{{$category->created_at}}</td>
                    <td><a href="/categories/{{$category->id}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
                    <td>
                        <form action="/categories/{{$category->id}}" method="post" onsubmit="return confirm('Are you sure you want to delete this category?');">
                            <!-- {{csrf_field()}} -->
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                    <td><a href="/categories/{{$category->id}}" class="btn btn-success btn-sm">Show</a></td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

