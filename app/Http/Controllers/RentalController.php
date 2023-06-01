<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\Customer;
use App\Models\Rental;
use App\Models\Inventory;
use App\Models\Film;
use Exception;







class RentalController extends Controller
{
    public function getRentalHistory(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customer,customer_id|numeric'
        ]);

        $customerId = $request->input('customer_id');

        // Validar que se haya proporcionado un ID de cliente
        if (!$customerId) {
            return redirect()->route('rental.history')->with('error', 'Por favor, ingresa un ID de cliente.');
        }

        // Llamar al procedimiento almacenado y obtener los resultados
        $results = DB::select('CALL get_rental_history(?)', [$customerId]);

        // Verificar si se obtuvieron resultados
        if (!$results) {
            return redirect()->route('rental.history')->with('error', 'No se encontraron registros para el cliente especificado.');
        }

        // Redireccionar a la vista de resultados con los datos obtenidos
        return view('rental.history-results', compact('results'));
    }

    public function showRentalHistory()
    {
        return view('rental.history');
    }

    public function getTotalIncome(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customer,customer_id|numeric'
        ]);
    
        $customerId = $request->input('customer_id');
        $totalIncome = 0;
    
        // Validar que se haya proporcionado un ID de cliente
        if (!$customerId) {
            return redirect()->route('rental.history')->withErrors(['message' => 'Por favor, ingresa un ID de cliente.']);
        }
    
        // Verificar si el cliente existe en la base de datos
        $customerExists = DB::table('customer')->where('customer_id', $customerId)->exists();
        if (!$customerExists) {
            return redirect()->route('rental.history')->withErrors(['message' => 'El cliente especificado no existe en la base de datos.']);
        }
    
        // Llamar al procedimiento almacenado y obtener los resultados
        DB::select('CALL get_total_income_by_customer(?, @totalIncome)', [$customerId]);
        $results = DB::select('SELECT @totalIncome AS total_income');
    
        // Obtener el nombre, apellido y ID del cliente
        $customer = DB::table('customer')->select('first_name', 'last_name', 'customer_id')->where('customer_id', $customerId)->first();
    
        // Verificar si se obtuvieron resultados
        if (!$results) {
            return redirect()->route('rental.history')->withErrors(['message' => 'El Id solo contiene números.']);
        }
    
        // Redireccionar a la vista de resultados con los datos obtenidos
        return view('rental.total-income', compact('results', 'customer'));
    }
    


    public function getPopularMovies(Request $request)
{
    $request->validate([
        'limit_count' => 'required|numeric'
    ]);
    try {
        $limitCount = $request->input('limit_count');

        // Verificar si el límite es un número negativo
        if ($limitCount < 0) {
            return redirect()->back()->with('error', 'El límite debe ser un número positivo.');
        }

        $results = DB::select('CALL get_popular_movies(?)', [$limitCount]);
        return view('rental.popular-movies', compact('results'));
    } catch (Exception $e) {
        return redirect()->back()->with('error', 'Error al obtener las películas populares: ' . $e->getMessage());
    }
}



    public function getFilmStock(Request $request)
    {
        $request->validate([
            'film_id' => 'required|exists:film,film_id|numeric'
        ]);
        
        $filmId = $request->input('film_id');
        $filmName = '';
        $stock = 0;

        try {
            DB::beginTransaction();

            DB::select('CALL get_film_stock(?, @film_name, @stock)', [$filmId]);
            $result = DB::select('SELECT @film_name AS film_name, @stock AS stock');

            if (!empty($result) && isset($result[0]->film_name) && isset($result[0]->stock)) {
                $filmName = $result[0]->film_name;
                $stock = $result[0]->stock;
            } else {
                throw new Exception('');
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al obtener los datos de stock de la película: ' . $e->getMessage());
        }

        return view('rental.film-stock', compact('filmName', 'stock', 'filmId'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'customer_id' => 'required|exists:customer,customer_id',
            'inventory_id' => 'required|exists:inventory,inventory_id'
        ]);

        // Obtener los datos del formulario
        $customerId = $request->input('customer_id');
        $inventoryId = $request->input('inventory_id');

        // Insertar el nuevo alquiler en la base de datos
        DB::table('rental')->insert([
            'rental_date' => now(),
            'inventory_id' => $inventoryId,
            'customer_id' => $customerId,
            'return_date' => null,
            'staff_id' => null,
            'last_update' => now()
        ]);

        // Redireccionar a la página de historial de alquileres con un mensaje de éxito
        return redirect()->route('rental.history')->with('success', 'El alquiler se ha creado correctamente.');
    }

    public function create()
    {
        // Lógica para mostrar el formulario de creación de alquileres
        return view('rental.create-rental');
    }
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));
    }

    // Método para actualizar los datos de un cliente
    public function update(Request $request, $id)
{
    $customer = Customer::find($id);

    if ($customer) {
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->email = $request->input('email');
        // Actualiza los demás campos según corresponda

        $customer->save();

        return redirect()->route('customer.index')->with('success', 'Customer updated successfully.');
    }

    return redirect()->route('customer.index')->with('error', 'Customer not found.');
}
    public function showAuditTable()
    {
        $audits = DB::table('customer_audit')->get();

        return view('customer.audit', compact('audits'));
    }
    public function index()
    {
        // Lógica para obtener los clientes de la base de datos
        $customers = Customer::all();

        // Retornar la vista con los datos de los clientes
        return view('customer.index', compact('customers'));
    }
}

    

