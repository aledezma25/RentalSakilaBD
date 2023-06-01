<!DOCTYPE html>
<html>
<head>
    <title>Films Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
       <h1>Films Table</h1>
        <a href="/rental/history" class="btn btn-primary">Volver</a><br/><br/>
            <table class="table">
                <thead>
                     <tr>
                        <th>Film Id</th>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>año de lanzamiento</th>
                        <th>film rate</th>
                        <th>Duracion en minutos</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($films as $film)
                    <tr>
                    <td>{{ $film->film_id}}</td>
                    <td>{{ $film->title}}</td>
                    <td>{{ $film->description}}</td>
                    <td>{{ $film->release_year}}</td>
                    <td>{{ $film->rental_rate}}</td>
                    <td>{{ $film->length}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
</body>
</html>