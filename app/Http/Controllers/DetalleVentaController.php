<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detalleVentas = DetalleVenta::simplePaginate(5);
        return view('detalleventas.index', compact('detalleVentas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('detalleventas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'venta_id' => 'required|integer',
            'product_id' => 'required|integer',
            'cantidad' => 'required|integer',
            'subtotal' => 'required|numeric'
        ]);

        DetalleVenta::create($request->all());

        return redirect()->route('detalleventas.index')->withStatus('Se agregó un nuevo detalle de venta');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetalleVenta $detalleVenta)
    {
        return view('detalleventas.show', compact('detalleVenta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetalleVenta $detalleVenta)
    {
        return view('detalleventas.edit', compact('detalleVenta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetalleVenta $detalleVenta)
    {
        $request->validate([
            'venta_id' => 'required|integer',
            'product_id' => 'required|integer',
            'cantidad' => 'required|integer',
            'subtotal' => 'required|numeric'
        ]);

        $detalleVenta->update($request->all());

        return redirect()->route('detalleventas.index')->withStatus('Los detalles de la venta se actualizaron correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetalleVenta $detalleVenta)
    {
        $detalleVenta->delete();
        return redirect()->route('detalleventas.index')->withStatus('Se eliminó un detalle de venta correctamente');
    }
}
