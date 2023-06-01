<!DOCTYPE html>
<html>
<head>
    <title>Sakila BD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <div class="container mt-4">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <h1 class="navbar-brand">Vista de Tablas</h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/films">Peliculas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/actors">Actores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/customers">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/rentals">Alquiler</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>
</head>
<body>
    <div class="container mt-4">
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                <p style="color: red; text-align: center">{{ session('error') }}</p>
            </div>
        @endif

        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <p style="color: red; text-align: center">No se encontraron registros para el cliente especificado.</p>
                </div>
            @endforeach
        @endif

        <br/><h1>Rental History</h1>
        <form action="{{ route('rental.history.results') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="customer_id">ID del Cliente:</label>
                <input type="number" name="customer_id" id="customer_id" placeholder="Ingrese el ID del Cliente" required>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <br/><div class="mt-4">
            <h1>Consultar Total Income</h1>
            <form action="{{ route('rental.total-income') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="customer_id">ID del Cliente:</label>
                    <input type="number" name="customer_id" id="customer_id" placeholder="Ingrese el ID del Cliente" required>
                    <button type="submit" class="btn btn-primary">Consultar</button>
                </div>
            </form>
        </div>

        <br/><div class="mt-4">
            <h1>Consultar Películas Populares</h1>
            <form action="{{ route('rental.popular-movies') }}" method="GET">
                @csrf
                <div class="form-group">
                    <label for="limit_count">Cantidad de Películas:</label>
                    <input type="number" name="limit_count" id="limit_count" placeholder="Ingrese la cantidad" required>
                    <button type="submit" class="btn btn-primary">Ver Películas Populares</button>
                </div>
            </form>
        </div>

        <br/><div class="mt-4">
            <h1>Stock de película en inventario</h1>
            <form action="{{ route('rental.film-stock') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="film_id">ID de la Película:</label>
                    <input type="number" name="film_id" id="film_id" placeholder="Ingrese el ID de la Película" required>
                    <button type="submit" class="btn btn-primary">Consultar Stock</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
</body>
<!-- Footer -->
<br/><br/><br/><footer class="text-center text-lg-start bg-white text-muted">
    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Adrian Camilo Ledezma
                    </h6>
                    <p>
                        Estudiante Administración de Sistemas Informáticos
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Aldemir Vargas Eudor
                    </h6>
                    <p>
                        Profesor Bases de Datos II
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Links -->
                   <h6 class="text-uppercase fw-bold mb-4">
                        Proyecto Final
                    </h6>
                    <p>
                        Procedimientos y triggers Base de Datos Sakila
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Framework</h6>
                    <p><i class="fas fa-home me-3 text-secondary"></i>Laravel v8.83.27</p>
                    {{-- <p><i class="fas fa-envelope me-3 text-secondary"></i>Base de datos: Sakila</p> --}}
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
        <p class="m-0">
            &copy; May 2023 Adrian Camilo Ledezma.
        </p>
        <a class="text-reset fw-bold" href="https://github.com/aledezma25">github.com/aledezma25</a>
    </div>
</footer>
</html>
