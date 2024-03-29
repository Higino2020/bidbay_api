<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $comentario=Comentario::with(['user','produto'])->get();
        return response()->json($comentario, 200);
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
        $comentario=null;
        if (isset($request->id)) {
            # code...
            $comentario=Comentario::find($id);
        } else {
            # code...
            $comentario= new Comentario();
        }
        $comentario->comentario=$request->comentario;
        $comentario->img=$request->img;
        $comentario->produto_id=$request->produto_id;
        $comentario->user_id=$request->user_id;
        $comentario->save();
        return response()->json($comentario, 200);

    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        $comentario=Comentario::with(['user','produto'])->find($id);
        return response()->json($comentario, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function apagar( $id)
    {
        //
        Comentario::find($id)->delete();
        return response()->json(['result'=>true], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
