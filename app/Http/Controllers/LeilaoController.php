<?php

namespace App\Http\Controllers;

use App\Models\Leilao;
use Illuminate\Http\Request;

class LeilaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $leilao=Leilao::all();
        return response()->json($leilao,200);
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
        $leilao=null;
        if (isset($request->id)) {
            $leilao= Leilao::find($request->id);
        } else {
        $leilao=new Leilao();
        }
        $leilao->vendedor_id=$request->vendedor_id;
        $leilao->produto_id=$request->produto_id;
        $leilao->tempo=$request->tempo;
        $leilao->estado=$request->estado;
        $leilao->save();
        return response()->json($leilao,200);
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $leilao= Leilao::find($id);
        return response()->json($leilao,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function apagar( $id)
    {
        //
        $leilao= Leilao::find($id);
        $leilao->delete();
        return response()->json(['result'=>true],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leilao $leilao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leilao $leilao)
    {
        //
    }
}
