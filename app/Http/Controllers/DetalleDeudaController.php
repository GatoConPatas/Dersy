<?php

use App\Models\DetalleDeuda;
use Illuminate\Http\Request;

class DetalleDeudaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detalleDeudas = DetalleDeuda::simplePaginate(5);
        return view('detalledeudas.index', compact('detalleDeudas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('detalledeudas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'venta_id' => 'required',
        ]);

        DetalleDeuda::create($request->all());

        return redirect()->route('detalledeudas.index')->withStatus('Se agregó un nuevo detalle de deuda');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetalleDeuda $detalleDeuda)
    {
        return view('detalledeudas.show', compact('detalleDeuda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetalleDeuda $detalleDeuda)
    {
        return view('detalledeudas.edit', compact('detalleDeuda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetalleDeuda $detalleDeuda)
    {
        $request->validate([
            'venta_id' => 'required',
        ]);

        $detalleDeuda->update($request->all());

        return redirect()->route('detalledeudas.index')->withStatus('Se actualizó el detalle de deuda con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetalleDeuda $detalleDeuda)
    {
        $detalleDeuda->delete();
        return redirect()->route('detalledeudas.index')->withStatus('Se eliminó el detalle de deuda con éxito');
    }
}
