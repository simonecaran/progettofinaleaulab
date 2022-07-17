<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <h1>L'utente {{$user->name}} {{$user->surname}} ha richiesto di diventare revisore</h1>
    <h2>Email: {{$user->email}}</h2>
    <a href="{{route('make.revisor', compact('user'))}}">Rendi revisore</a>
</body>
</html>