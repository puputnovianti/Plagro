<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factor</title>
</head>

<body>
    <h1>Factor : {{ $factor }} </h1>

    <ul style="list-style: none">
        @foreach($criterias as $index => $criteria)
        <li>{{ $index + 1}} - {{ $criteria->name }}</li>
        @endforeach
    </ul>

</body>

</html>