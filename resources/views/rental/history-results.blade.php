<!DOCTYPE html>
<html>
<head>
    <title>Rental History Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Rental History Results</h1>
        <a href="/rental/history" class="btn btn-primary">Volver</a><br/><br/>
        @if (count($results) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Rental Date</th>
                        <th>Film Title</th>
                        <th>Actor First Name</th>
                        <th>Actor Last Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr>
                            <td>{{ $result->rental_date }}</td>
                            <td>{{ $result->title }}</td>
                            <td>{{ $result->first_name }}</td>
                            <td>{{ $result->last_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No se encontraron registros para el cliente especificado.</p>
        @endif
    </div>
</body>
</html>
