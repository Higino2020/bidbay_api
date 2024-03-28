<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Plank\Mediable\Facades\MediaUploader;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoria=Categoria::all();
        return response()->json($categoria,200);
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
        $categoria=null;
        if (isset($request->id)) {
            $categoria=Categoria::find($request->id);
        } else {
            $categoria=new Categoria();
        }
        if (request()->hasFile('imagem')) {
            $media = MediaUploader::fromSource(request()->file('imagem'))
                ->toDirectory('imagem')->onDuplicateIncrement()
                ->useHashForFilename()
                ->setAllowedAggregateTypes(['image/*'])->upload();
            $categoria->imagem = $media->basename;
        }
        $categoria->nome=$request->nome;
        $categoria->descricao=$request->descricao;
        $categoria->save();
        return response()->json($categoria,200);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $categoria=Categoria::find($id);
        return response()->json($categoria,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function apagar( $id)
    {
        $categoria=Categoria::find($id);
        $categoria->delete();
        return response()->json(['result'=>true],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
