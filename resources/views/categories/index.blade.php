<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo config('app.name') ;  ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

</head>
<body>
<h1>
    Categories
</h1>
<small><a href="/categories/create">Create</a></small>
<table>
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
        <?php foreach ($categories as $category): ?>
            <tr>
        <td><?=$category->id;  ?></td>
        <td><a href="/categories/<?=  $category->id;?>"><?=$category->name;?></a></td>
        <td><?=$category->slug;  ?></td>
        <td><?=$category->parent_id;  ?></td>
        <td><?=$category->created_at;  ?></td>
        <td><a href="/categories/<?=$category->id ;?>/edit">Edit</a></td>
        <td><form action="categories/<?=$category->id ?>" method="post">
            <?= csrf_field() ?>
            @method('delete')
            <button>Delete</button>
        </form>
        </td>
    </tr>
   <?php endforeach ; ?>
    </tbody>
</table>

</body>
</html>
