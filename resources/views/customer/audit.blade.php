<!DOCTYPE html>
<html>
<head>
    <title>Auditoría de Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
       <h1>Auditoría de Clientes</h1>
        <a href="{{ route('customer.index') }}" class="btn btn-primary">Volver</a><br/><br/>

        <table class="table">
            <thead>
                <tr>
                    <th>Audit ID</th>
                    <th>Customer ID</th>
                    <th>Tipo de Acción</th>
                    <th>Fecha de Acción</th>
                    <th>Descripción del Cambio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($audits as $audit)
                <tr>
                    <td>{{ $audit->audit_id }}</td>
                    <td>{{ $audit->customer_id }}</td>
                    <td>{{ $audit->action_type }}</td>
                    <td>{{ $audit->action_date }}</td>
                    <td>{{ $audit->change_description }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
