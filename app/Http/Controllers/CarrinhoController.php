<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $carrinho= Carrinho::all();
        return response()->json($carrinho,200);
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
        $carrinho=null;
        if (isset($request->id)) {
            $carrinho= Carrinho::find($request->id);
        } else {
            $carrinho= new Carrinho();
        }
        $carrinho->user_id=$request->user_id;
        $carrinho->produto_id=$request->produto_id;
        $carrinho->quantidade=$request->quantidade;
        $carrinho->color=$request->color;
        $carrinho->tamanho=$request->tamanho;
        $carrinho->save();
        return response()->json($carrinho,200);        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $carrinho= Carrinho::find($id);
        return response()->json($carrinho,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function apagar( $id)
    {
        //
        $carrinho= Carrinho::find($id);
        $carrinho->delete();
        return response()->json(['result'=>true],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrinho $carrinho)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrinho $carrinho)
    {
        //
    }
}
