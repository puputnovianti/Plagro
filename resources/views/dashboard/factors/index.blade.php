<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factors</title>
</head>

<body>
    <h1>Factors</h1>

    <ul style="list-style: none">
        @foreach($factors as $index => $factor)
        <li>{{ $index + 1}} - {{ $factor->name }} <a href="/dashboard/factors/{{$factor->id}}">Show</a></li>
        @endforeach
    </ul>
   
</body>

</html>