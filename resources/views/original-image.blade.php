<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Оригинальное изображение</title>
</head>
<body>
<img src="{{ asset('images/' . $image->name) }}" alt="Original Image">
<div class="row mt-3">
    <div class="col">
        <a href="{{ route("all-image") }}" class="btn btn-primary">Назад</a>
    </div>
</div>
</body>
</html>
