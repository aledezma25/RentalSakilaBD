<!DOCTYPE html>
<html>
<head>
    <title>Crear Alquiler</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Crear Alquiler</h1>
                        <a href="{{ route('rental.history') }}" class="btn btn-primary">Volver</a>
                        <br><br>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('rental.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="customer_id">ID del Cliente:</label>
                                <input type="number" name="customer_id" id="customer_id" class="form-control" placeholder="Ingrese el ID del Cliente" required>
                            </div>
                            <div class="form-group">
                                <label for="inventory_id">ID del Inventario:</label>
                                <input type="number" name="inventory_id" id="inventory_id" class="form-control" placeholder="Ingrese el ID del Inventario" required>
                            </div>
                            <div class="form-group">
                                <label for="return_date">Fecha de devolución:</label>
                                <input type="date" name="return_date" class="form-control">
                             </div>
                            <div class="form-group">
                                <label for="staff_id">ID del personal:</label>
                                <input type="number" name="staff_id" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Alquiler</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
