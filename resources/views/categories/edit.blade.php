<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo config('app.name') ;?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">

    <h1>Edit Category</h1>

    <form action="/categories/<?= $category->id ;?>" method="post" >
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Name</label>
        <input type="text"  id="name" name="name" value="<?= $category->name ;?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"><?=$category->description ;?></textarea>
        </div>

        <div class="form-group">
            <label for="parent_id">Parent ID</label>
            <select id="parent_id" name="parent_id" class="form-control" value="">
                <option value="">No Parent</option>
                <option value=""></option>
            </select>
        </div>

        <div class="form-group">
            <label for="art_file">Name</label>
        <input type="file"  id="art_file" name="art_file" class="form-control" value="">
        </div>

        <div class="form-group">
            <button class="btn btn-primary">update</button>
        </div>
    </form>
    </div>
</body>
</html>
