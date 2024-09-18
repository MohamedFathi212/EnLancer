<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            font-size: 2.5rem;
            font-weight: bold;
        }
        .container {
            margin-top: 30px;
            max-width: 900px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            margin-bottom: 20px;
        }
        th, td {
            text-align: center;
            padding: 12px;
            font-size: 1rem;
            color: #333;
        }
        th {
            background-color: #f1f1f1;
            color: #333;
            font-size: 1.1rem;
        }
        td {
            background-color: #f9f9f9;
        }
        a.text-decoration-none {
            color: #007bff;
            font-weight: bold;
        }
        a.text-decoration-none:hover {
            color: #0056b3;
        }
        .btn {
            margin-right: 5px;
        }
        .alert {
            text-align: center;
            font-size: 1.1rem;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-warning {
            background-color: #ffc107;
            border: none;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Categories</h1>

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

</body>
</html>
