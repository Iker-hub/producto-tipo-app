<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoEditRequest;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    function __construct() {
        //$this-> middleware('logged', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
        $this-> middleware('logged', ['except' => ['index', 'show']]);        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all()->sortBy('nombre');
        return view('producto.index', ['activeProducto' => 'active',
                                        'productos' => $productos,
                                        'subTitle' => 'Product list',
                                        'title' => 'Product',]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create', ['activeProducto' => 'active',
                                        'subTitle' => 'Add product',
                                        'title' => 'Product',]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|min:2|max:100',
            'precio' => 'required|numeric|gte:0.00|lte:9999999.99',
        ];
        $messages = [
            'nombre.max'      => 'name is too long',
            'nombre.min'      => 'name is too short',
            'nombre.required' => 'name is required',
            'precio.gte'      => 'price is too low',
            'precio.lte'      => 'price is too high',
            'precio.numeric'  => 'price has te be numeric',
            'precio.required' => 'price is required',
        ];
        $validator = Validator::make($request->all() ,$rules, $messages);
        if ($validator->fails()) {
            return back()
                    ->withInput()
                    ->withErrors($validator);
        }
        $product = new Producto($request->all());
        try {
            $product->save();
            $message = 'The product has been inserted with id number: ' . $product->id;
        } catch(\Exception $e) {
            return back()
                    ->withInput()
                    ->withErrors(['store' => 'An unexpected error occurred while inserting.']);
        }
        return redirect('producto')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('producto.show', ['activeProducto' => 'active',
                                        'producto' => $producto,
                                        'subTitle' => 'Show product',
                                        'title' => 'Product',]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('producto.edit', ['activeProducto' => 'active',
                                        'producto' => $producto,
                                        'subTitle' => 'Edit product',
                                        'title' => 'Product',]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoEditRequest $request, Producto $producto)
    {
        try {
            $producto->update($request->all());
            //$producto->fill($request->all());
            //$producto->save();
            $message = 'The product has been updated.';
        } catch(Exception $e) {
            return back()
                    ->withInput()
                    ->withErrors(['update' => 'An unexpected error occurred while updating.']);
        }
        return redirect('producto')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        try {
            $producto->delete();
            $message = 'The product ' . $producto->nombre . ' has been removed.';
        } catch(\Exception $e) {
            $message = 'The product ' . $producto->nombre . ' has not been removed.';
        }
        return redirect('producto')->with('message', $message);
    }
}
