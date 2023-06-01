<!DOCTYPE html>
<html>
<head>
    <title>Stock de Película</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4>Stock de Película</h4>
                        <a href="/rental/history" class="btn btn-primary">Volver</a><br/><br/>

                        @if ($stock !== 0)
                            <p>ID de la Película: {{ $filmId }}</p>
                            <p>Nombre de la Película: {{ $filmName }}</p>
                            <p>Stock Actual: {{ $stock }}</p>
                            <b><p class="alert alert-success" role="alert">Esta película cuenta con stock suficiente para arrendar.</p></b>
                        @else
                        <p>ID de la Película: {{ $filmId }}</p>
                            <p>Nombre de la Película: {{ $filmName }}</p>
                            <p>Stock Actual: {{ $stock }}</p>
                            <b><p class="alert alert-danger" role="alert">Esta película no está disponible para arrendar.</p></b>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
