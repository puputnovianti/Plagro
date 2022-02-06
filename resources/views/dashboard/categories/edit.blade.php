<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
</head>
<body>
    <h1>Edit Category</h1>

    <form action="/categories/{{ $category->id }}" method="post">
        @method('put')
        @csrf
        <input type="text" name="list" value="{{ $category->list }}" placeholder="input the category">
        <button type="submit">Update</button>
    </form>

</body>
</html>