<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            font-size: 2.5rem;
            font-weight: bold;
        }
        .container {
            margin-top: 40px;
            max-width: 600px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            color: #333;
        }
        input[type="text"],
        textarea,
        select,
        input[type="file"] {
            background-color: #f1f1f1;
            border: 1px solid #ced4da;
            padding: 10px;
            border-radius: 5px;
        }
        input[type="text"]:focus,
        textarea:focus,
        select:focus,
        input[type="file"]:focus {
            background-color: #fff;
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 1.1rem;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Edit Category</h1>

        <form action="/categories/{{$category->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('categories._form')
        </form>
    </div>

</body>
</html>
