<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Corre electronico de prueba</h1>
    <p>Hola {{$course->teacher->name}}</p>
    <p>Recives este correo para notificarte que tu curso <strong>{{$course->title}} </strong> ya fue publicado.</p>
    <p>Gracias por apoyar a la comunidad.</p>
</body>
</html>