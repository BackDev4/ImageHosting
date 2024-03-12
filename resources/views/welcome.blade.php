<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Form</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Загрузить изображения</h5>
                    <form action="{{ route('create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input class="form-control" type="file" name="images[]" multiple accept="image/*" max="5">
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-block" type="submit">Загрузить</button>
                        </div>
                    </form>
                    <div class="mt-3 text-center">
                        <a href="{{ route('all-image') }}" class="btn btn-secondary">Показать все изображения</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
