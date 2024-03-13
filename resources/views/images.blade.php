<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все изображения</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="container mt-5">
        <h1>Все изображения</h1>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('all-image') }}" method="GET">
                    <div class="input-group mb-3">
                        <select class="form-select" name="sort_by">
                            <option value="name">Сортировать по названию</option>
                            <option value="created_at">Сортировать по дате загрузки</option>
                        </select>
                        <button class="btn btn-primary" type="submit">Сортировать</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @foreach($images as $image)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <a href="{{route('show-image',$image->id)}}">
                            <img src="{{ asset('images/' . $image->name) }}" class="card-img-top" alt="Image">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $image->name }}</h5>
                            <p class="card-text">Загруженно: {{ $image->created_at }}</p>
                            <a href="{{ route('download-image', $image->id) }}" class="btn btn-primary">Скачать</a>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#imageModal{{$image->id}}">
                                Превью
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="imageModal{{$image->id}}" tabindex="-1" aria-labelledby="imageModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel">Превью изображения</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('images/' . $image->name) }}" class="img-fluid" alt="Image">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-3">
            <div class="col">
                <a href="{{ route('home') }}" class="btn btn-primary">Вернуться к форме создания</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
