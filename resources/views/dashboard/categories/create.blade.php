<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
</head>
<body>
    <h1>Create New Category</h1>

<form action="/categories" method="post">
    @csrf
    <input type="text" name="list" placeholder="input the category">
    <button type="submit">Submit</button>
</form>
</body>
</html>