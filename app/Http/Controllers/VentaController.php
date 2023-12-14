<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::simplePaginate(5);
        return view('ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ventas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'montoTotal' => 'required|numeric',
            'metodoPago' => 'required'
        ]);

        Venta::create($request->all());

        return redirect()->route('ventas.index')->withStatus('Se registró una nueva venta');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        return view('ventas.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        return view('ventas.edit', compact('venta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'montoTotal' => 'required|numeric',
            'metodoPago' => 'required'
        ]);

        $venta->update($request->all());

        return redirect()->route('ventas.index')->withStatus('Los datos de la venta se actualizaron correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index')->withStatus('Se eliminó una venta correctamente');
    }
}
