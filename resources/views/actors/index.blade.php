<!DOCTYPE html>
<html>
<head>
    <title>Actors Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
       <h1>Actors Table</h1>
        <a href="/rental/history" class="btn btn-primary">Volver</a><br/><br/>
            <table class="table">
                <thead>
                     <tr>
                        <th>Actor Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($actors as $actor)
                    <tr>
                    <td>{{ $actor->actor_id}}</td>
                    <td>{{ $actor->first_name}}</td>
                    <td>{{ $actor->last_name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
</body>
</html>