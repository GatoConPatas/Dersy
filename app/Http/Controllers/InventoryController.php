<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = Inventory::simplePaginate(5);
        return view('inventories.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all(); // Obtener todos los productos disponibles
        $suppliers = Supplier::all(); // Obtener todos los proveedores

        return view('inventories.create', compact('products', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required'],
            'stock' => ['required', 'integer'],
            'supplier_id' => ['nullable']
        ]);

        Inventory::create($request->all());
        return redirect()->route('inventories.index')->withStatus('Se agregó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('inventories.show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $inventory = Inventory::findOrFail($id);
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('inventories.edit', compact('inventory', 'products', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inventory = Inventory::findOrFail($id);
        $request->validate([
            'product_id' => ['required'],
            'stock' => ['required', 'integer'],
            'supplier_id' => ['nullable']
        ]);
        
        $inventory->update($request->all());
        return redirect()->route('inventories.index')->withStatus('Se actualizó el Inventario');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();
        return redirect()->route('inventories.index')->withStatus('Se eliminó un registro con éxito');
    }
}