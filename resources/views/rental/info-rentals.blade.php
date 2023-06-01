<!DOCTYPE html>
<html>
<head>
    <title>Rentals Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
       <h1>Rentals Table</h1>
        <a href="/rental/history" class="btn btn-primary">Volver</a><br/><br/>
        <a href="/rental/create" class="btn btn-primary">Crear un nuevo Alquiler</a><br/><br/>
            <table class="table">
                <thead>
                     <tr>
                        <th>Rental Id</th>
                        <th>Rental Date</th>
                        <th>Inventario Id</th>
                        <th>Customer Id</th>
                        <th>Return Date</th>
                        <th>Staff Id</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($rentals as $rental)
                    <tr>
                    <td>{{ $rental->rental_id }}</td>
                    <td>{{ $rental->rental_date }}</td>
                    <td>{{ $rental->inventory_id }}</td>
                    <td>{{ $rental->customer_id }}</td>
                    <td>{{ $rental->return_date }}</td>
                    <td>{{ $rental->staff_id }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
</body>
</html>
