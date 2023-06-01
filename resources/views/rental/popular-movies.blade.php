<!DOCTYPE html>
<html>
<head>
    <title>Películas Populares</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4>Películas Populares</h4>
                                <a href="/rental/history" class="btn btn-primary">Volver</a><br/><br/>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>TOP</th>
                                    <th>Título</th>
                                    <th>Cantidad de Alquileres</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach ($results as $movie)
                                    <tr>
                                        <td>{{ $counter }}</td>
                                        <td>{{ $movie->title }}</td>
                                        <td>{{ $movie->rental_count }}</td>
                                    </tr>
                                    @php
                                        $counter++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
