<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('rental.history');
});

use App\Models\Actor;
use App\Models\Film;
use App\Models\Rental;
use App\Models\Customer;

Route::get('/actors', function () {
    $actors = Actor::all();

    return view('actors.index', ['actors' => $actors]);
});

Route::get('/films', function () {
    $films = Film::all();

    return view('film.index', ['films' => $films]);
});
Route::get('/rentals', function () {
    $rentals = Rental::all();

    return view('rental.info-rentals', ['rentals' => $rentals]);
});

Route::get('/customers', function () {
    $customers = Customer::all();

    return view('customer.index', ['customers' => $customers]);
});

use App\Http\Controllers\RentalController;


// RUTAS PARA EL PRIMER PROCEDIMIENTO
Route::get('/rental/history', [RentalController::class, 'showRentalHistory'])->name('rental.history');
Route::post('/rental/history/results', [RentalController::class, 'getRentalHistory'])->name('rental.history.results');

//RUTAS PARA EL SEGUNDO PROCEDIMIENTO
Route::post('/rental/total-income', [RentalController::class, 'getTotalIncome'])->name('rental.total-income');

//RUTAS PARA EL TERCER PROCEDIMIENTO
Route::get('/rental/popular-movies', [RentalController::class, 'getPopularMovies'])->name('rental.popular-movies');

//RUTAS PARA EL CUARTO PROCEDIMIENTO
Route::post('/rental/film-stock', [RentalController::class, 'getFilmStock'])->name('rental.film-stock');


#Trigger 1
Route::get('/rental/create', [RentalController::class, 'create'])->name('rental.create');
Route::post('/rental/store', [RentalController::class, 'store'])->name('rental.store');

#Trigger 2
// Rutas para editar el cliente
Route::get('/customer', [RentalController::class, 'index'])->name('customer.index');
Route::get('/customer/edit/{customer}', [RentalController::class, 'edit'])->name('customer.edit');
Route::put('/customer/update/{customer}', [RentalController::class, 'update'])->name('customer.update');

// Ruta para ver la tabla customer_audit
Route::get('/customer/audit', [RentalController::class, 'showAuditTable'])->name('customer.audit');

