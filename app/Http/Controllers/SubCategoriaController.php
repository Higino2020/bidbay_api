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
        $subCategoria= SubCategoria::all();
        return response()->json($subCategoria,200);
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
        $subCategoria=null;
        if (isset($request->id)) {
            $subCategoria=SubCategoria::find($request->id);
        } else {
            $subCategoria= new SubCategoria();
        }
        if (request()->hasFile('imagem')) {
            $media = MediaUploader::fromSource(request()->file('imagem'))
                ->toDirectory('imagem')->onDuplicateIncrement()
                ->useHashForFilename()
                ->setAllowedAggregateTypes(['image/*'])->upload();
            $subCategoria->imagem = $media->basename;
        }
        $subCategoria->nome=$request->nome;
        $subCategoria->descricao=$request->descricao;
        $subCategoria->categoria_id=$request->categoria_id;
        $subCategoria->save();
        return response()->json($subCategoria,200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $subCategoria= SubCategoria::find($id);
       return response()->json($subCategoria,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function apagar($id)
    {
        $subCategoria=SubCategoria::find($id);
        $subCategoria->delete();
        return response()->json(['result'=>true],200);
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
