<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Plank\Mediable\Facades\MediaUploader;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produto = Produto::with(['vendedor','categoria','subcategoria'])->get();
        return response()->json($produto,200);
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
        $prod = null;
        if(isset($request->id)){
            $prod = Produto::find($request->id);
        }else{
            $prod = new Produto();
        }
        if (request()->hasFile('imagem')) {
            $media = MediaUploader::fromSource(request()->file('imagem'))
                ->toDirectory('imagem')->onDuplicateIncrement()
                ->useHashForFilename()
                ->setAllowedAggregateTypes(['image/*'])->upload();
            $prod->prod = $media->basename;
        }
        $prod->nome = $request->nome;
        $prod->descricao = $request->descricao;
        $prod->preco = $request->preco;
        $prod->quantidade_estoque = $request->quantidade_estoque;
        $prod->compras = 0;
        $prod->preco = $request->preco;
        $prod->origem = $request->origem;
        $prod->categoria_id = $request->categoria_id;
        $prod->subcategoria_id = $request->subcategoria_id;
        $prod->vendedor_id = $request->vendedor_id;
        $prod->estado = $request->estado;
        $prod->peso = $request->peso;
        $prod->largura = $request->largura;
        $prod->altura = $request->altura;
        $prod->comprimento = $request->comprimento;
        $prod->save();
        return response()->json($prod,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
