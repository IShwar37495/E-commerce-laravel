<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>users</h1>

    @foreach($user as $person)

    <p>{{$person->name}}</p>
    <p>{{$person->email}}</p>
    @endforeach
</body>
</html>