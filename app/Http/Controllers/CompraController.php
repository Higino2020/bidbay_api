<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Produto;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $compra= Compra::with(['produto'])->get();
        return response()->json($compra,200);
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
        $compra=null;
        if (isset($request->id)) {
            $compra= Compra::fid($request->id);
        } else {
            $compra= new Compra();
        }
        $compra->user_id= $request->user_id;
        $compra->produto_id=$request->produto_id;
        $compra->quantidade=$request->quantidade;
        $compra->color=$request->color;
        $compra->tamanho=$request->tamanho;
        $compra->total=$request->total;
        $compra->save();

        $prod = Produto::find($compra->produto_id);
        $prod->compras += 1;
        $prod->quantidade_estoque -=1;
        $prod->save();
        return response()->json($compra,200);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        $compra= Compra::with(['produto'])->find($id);
        return response()->json($compra,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function apagar( $id)
    {
        $compra= Compra::find($id);
        $compra->delete();
        return response()->json(['result'=>true],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
