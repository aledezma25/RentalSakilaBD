<!DOCTYPE html>
<html>
<head>
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
       <h1>Editar Cliente</h1>
        <a href="{{ route('customer.index') }}" class="btn btn-primary">Volver</a><br/><br/>
        
        <form method="POST" action="{{ route('customer.update', ['customer' => $customer->customer_id]) }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="first_name">Nombre:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $customer->first_name }}">
            </div>
            
            <div class="form-group">
                <label for="last_name">Apellido:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $customer->last_name }}">
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}">
            </div>
            
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
