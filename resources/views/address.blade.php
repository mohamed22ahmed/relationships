<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{ dd($users) }}
    @foreach ($users as $user)
        <h2>{{ $user->name }}</h2>
        {{-- to avoid nallable data, we can use optional helper function --}}
        <p>{{ optional($user->address)->country }}</p>
    @endforeach
</body>
</html>