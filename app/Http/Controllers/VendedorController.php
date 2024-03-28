<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendedor = Vendedor::with(['user'])->get();
        return response()->json($vendedor, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vendedor=null;
        if (isset($request->id)) {
            $vendedor=Vendedor::find($request->id);
        } else {
            $vendedor=new Vendedor();
        }
        $vendedor->nome=$request->nome;
        $vendedor->tipo=$request->tipo;
        $vendedor->categoria_id=$request->categoria_id;
        $vendedor->user_id=$request->user_id;
        $vendedor->save();
        return response()->json($vendedor,200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vendedor = Vendedor::find($id);
        return response()->json($vendedor, 200);
    }

    public function apagar($id){
        $vendedor = Vendedor::find($id);
        $vendedor->delete();
        return response()->json(['result'=>true], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendedor $vendedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendedor $vendedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendedor $vendedor)
    {
        //
    }
}
