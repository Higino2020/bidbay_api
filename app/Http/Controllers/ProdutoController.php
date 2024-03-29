<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Plank\Mediable\Facades\MediaUploader;

class ProdutoController extends Controller
{
   
    public function index()
    {
        $produto = Produto::with(['vendedor','categoria','subcategoria','imagem','leilao','licitar',
        'compra'])->get();
        return response()->json($produto,200);
    }

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
            $prod->imagem = $media->basename;
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

    
    public function show($id)
    {
        $prod = Produto::with(['vendedor','categoria','subcategoria','imagem','leilao','licitar',
        'compra'])->find($id);
        return response()->json($prod,200);
    }

   public function apagar($id){
        Produto::find($id)->delete();
        return response()->json(['result'=>true],200);
   }
}
