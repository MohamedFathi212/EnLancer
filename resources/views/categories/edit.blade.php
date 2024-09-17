<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo config('app.name'); ?></title>
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

        <form action="/categories/<?= $category->id; ?>" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?= $category->name; ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4"><?= $category->description; ?></textarea>
            </div>

            <div class="form-group">
                <label for="parent_id">Parent ID</label>
                <select id="parent_id" name="parent_id" class="form-control">
                    <option value="">No Parent</option>
                    <option value=""></option>
                    <!-- Populate parent categories dynamically -->
                </select>
            </div>

            <div class="form-group">
                <label for="art_file">Upload Image</label>
                <input type="file" id="art_file" name="art_file" class="form-control">
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

</body>
</html>
