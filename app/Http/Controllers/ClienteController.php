<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::simplePaginate(5);
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'apellido' => 'required',
            'dni' => 'required|digits:8',
            'phoneNumber' => 'required|digits:9'
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->withStatus('Se agregó un nuevo cliente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'name' => 'required',
            'apellido' => 'required',
            'dni' => 'required|digits:8',
            'phoneNumber' => 'required|digits:9'
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->withStatus('Se actualizaron los datos del cliente con éxito');
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->withStatus('Se eliminó un cliente con éxito');
    }
}
