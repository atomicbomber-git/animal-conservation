<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    @foreach($users as $user)
        <div>
            <p> {{ $user->name }} </p>
            <img src="{{ route('user-identity-card', $user) }}">
        </div>
    @endforeach
</body>
</html>