<?php

namespace App\Http\Controllers;

use App\Models\SubCategoria;
use Illuminate\Http\Request;

class SubCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
        $subCategoria=null;
        if (isset($request->id)) {
            # code...
            $subCategoria=SubCategoria::find($request->id);
        } else {
            # code...
            $subCategoria= new SubCategoria();
        }
        $subCategoria->nome=$request->nome;
        $subCategoria->imagem=$request->imagem;
        $subCategoria->descricao=$request->descricao;
        $subCategoria->categoria_id=$request->categoria_id;
        $subCategoria->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategoria $subCategoria)
    {
        //
       
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategoria $subCategoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategoria $subCategoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategoria $subCategoria)
    {
        //
    }
}
