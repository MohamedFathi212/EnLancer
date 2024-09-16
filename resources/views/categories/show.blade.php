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
    Shoe Categories
</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Parent ID</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
            <tr>
        <td><?=$category->id;  ?></td>
        <td><a href="/categories/<?=  $category->id;?>"><?=$category->name;?></a></td>
        <td><?=$category->slug;  ?></td>
        <td><?=$category->parent_id;  ?></td>
        <td><?=$category->created_at;  ?></td>
        </tr>
    </tbody>
</table>

</body>
</html>
