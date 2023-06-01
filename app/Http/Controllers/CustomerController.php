<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));
    }

    // Método para actualizar los datos de un cliente
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->fill($request->all());
        $customer->save();

        return redirect()->route('customer.index')->with('success', 'Cliente actualizado correctamente.');
    }
    public function showAuditTable()
    {
        $audits = DB::table('customer_audit')->get();

        return view('customer.audit', compact('audits'));
    }
}
