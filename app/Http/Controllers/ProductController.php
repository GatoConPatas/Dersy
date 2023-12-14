<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activePage = 'products';
        $products = Product::simplePaginate(5);
        return view('products.index', compact('products', 'activePage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'max:2020', 'image'],
            'name' => ['required'],
            'description' => ['required'],
            'category_id' => ['required'],
            'p_price' => ['required', 'numeric'],
            's_price' => ['required', 'numeric']
        ]);
    
        $fileName = time() . '_' . $request->image->getClientOriginalName();
        $filePath = $request->image->move(public_path('assets/img/products/'), $fileName);
    
        $product = new Product();
        $product->image = 'assets/img/products/' . $fileName; 
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->p_price = $request->p_price;
        $product->s_price = $request->s_price;
        $product->save();
    
        return redirect()->route('products.index')->withStatus('Se agregó un nuevo producto');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'image' => ['sometimes', 'max:2020', 'image'],
            'name' => ['required'],
            'description' => ['required'],
            'category_id' => ['required'],
            'p_price' => ['required','numeric'],
            's_price' => ['required','numeric']

        ]);
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->image->getClientOriginalName();
    
            // Mover la imagen a la ubicación deseada
            $filePath = $request->image->move(public_path('assets/img/products'), $fileName);
    
            // Asignar la nueva ruta de la imagen al producto
            $product->image = 'assets/img/products/' . $fileName;
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->p_price = $request->p_price;
        $product->s_price = $request->s_price;

    // Guardar los cambios en el producto
        $product->save();

        return redirect()->route('products.index')->withStatus('Se actualizó el producto');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->withStatus('Se eliminó un producto con éxito');
    }
}
