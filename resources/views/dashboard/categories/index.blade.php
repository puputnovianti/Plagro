<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
</head>
<body>
    <h1>Categories</h1>
<a href="/categories/create">Create New Category</a>

    <ul style="list-style: none">
        @foreach($categories as $index => $category)
            <li>{{ $index + 1}} - {{ $category->list }}  
                <div>
                    <a href="/categories/{{ $category->id }}/edit">Edit</a>
                    <form action="/categories/{{ $category->id }}" method="POST" style="display: inline">
                        @method('delete')
                        @csrf
                    <button type="submit">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</body>
</html>