<!DOCTYPE html>
<html>
<head>
    <title>Customers Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Customers Table</h1>
        <a href="/rental/history" class="btn btn-primary">Volver</a><br/><br/>
        <a href="/customer/audit" class="btn btn-primary">Ver historial de cambios</a><br/><br/>
        <table class="table">
            <thead>
                <tr>
                    <th>Customer Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Acciones</th> <!-- Nueva columna para acciones -->
                </tr>
            </thead>
            <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->customer_id }}</td>
                    <td>{{ $customer->first_name }}</td>
                    <td>{{ $customer->last_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>
                        <a href="{{ route('customer.edit', $customer->customer_id) }}" class="btn btn-primary">Editar</a>
                    </td> <!-- Agrega el enlace para editar el cliente -->
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
