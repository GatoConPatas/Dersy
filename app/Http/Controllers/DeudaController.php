<?php

use App\Models\DeudaCliente;
use Illuminate\Http\Request;

class DeudaClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deudaClientes = DeudaCliente::simplePaginate(5);
        return view('deudaclientes.index', compact('deudaClientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('deudaclientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required',
            'estado' => 'required',
            'total' => 'required|numeric',
        ]);

        DeudaCliente::create($request->all());

        return redirect()->route('deudaclientes.index')->withStatus('Se agregó una nueva deuda de cliente');
    }

    /**
     * Display the specified resource.
     */
    public function show(DeudaCliente $deudaCliente)
    {
        return view('deudaclientes.show', compact('deudaCliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeudaCliente $deudaCliente)
    {
        return view('deudaclientes.edit', compact('deudaCliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DeudaCliente $deudaCliente)
    {
        $request->validate([
            'cliente_id' => 'required',
            'estado' => 'required',
            'total' => 'required|numeric',
        ]);

        $deudaCliente->update($request->all());

        return redirect()->route('deudaclientes.index')->withStatus('Se actualizó la deuda del cliente con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeudaCliente $deudaCliente)
    {
        $deudaCliente->delete();
        return redirect()->route('deudaclientes.index')->withStatus('Se eliminó la deuda del cliente con éxito');
    }
}
