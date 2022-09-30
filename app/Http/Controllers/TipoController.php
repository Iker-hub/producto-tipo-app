<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoEditRequest;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoController extends Controller
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
        $tipos = Tipo::all()->sortBy('tipo');
        return view('tipo.index', ['activeTipo' => 'active',
                                        'tipos' => $tipos,
                                        'subTitle' => 'Type list',
                                        'title' => 'Type',]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo.create', ['activeTipo' => 'active',
                                        'subTitle' => 'Add type',
                                        'title' => 'Type',]);
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
            'tipo' => 'required|min:2|max:100',
        ];
        $messages = [
            'tipo.max'      => 'type is too long',
            'tipo.min'      => 'type is too short',
            'tipo.required' => 'type is required',
        ];
        $validator = Validator::make($request->all() ,$rules, $messages);
        if ($validator->fails()) {
            return back()
                    ->withInput()
                    ->withErrors($validator);
        }
        $type = new Tipo($request->all());
        try {
            $type->save();
            $message = 'The type has been inserted with id number: ' . $type->id;
        } catch(\Exception $e) {
            return back()
                    ->withInput()
                    ->withErrors(['store' => 'An unexpected error occurred while inserting.']);
        }
        return redirect('tipo')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo $tipo)
    {
        return view('tipo.show', ['activeTipo' => 'active',
                                        'tipo' => $tipo,
                                        'subTitle' => 'Show type',
                                        'title' => 'Type',]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo $tipo)
    {
        return view('tipo.edit', ['activeTipo' => 'active',
                                        'tipo' => $tipo,
                                        'subTitle' => 'Edit type',
                                        'title' => 'Type',]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(TipoEditRequest $request, Tipo $tipo)
    {
        try {
            $tipo->update($request->all());
            //$tipo->fill($request->all());
            //$tipo->save();
            $message = 'The type has been updated.';
        } catch(Exception $e) {
            return back()
                    ->withInput()
                    ->withErrors(['update' => 'An unexpected error occurred while updating.']);
        }
        return redirect('tipo')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo $tipo)
    {
        try {
            $tipo->delete();
            $message = 'The type ' . $tipo->nombre . ' has been removed.';
        } catch(\Exception $e) {
            $message = 'The type ' . $tipo->nombre . ' has not been removed.';
        }
        return redirect('tipo')->with('message', $message);
    }
}
