<?php

namespace App\Http\Controllers;

use App\Models\Licitar;
use Illuminate\Http\Request;

class LicitarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $licitar= Licitar::all();
        return response()->json($licitar,200);
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
        $licitar=null;
        if (isset($request->id)) {
           $licitar= Licitar($request->id);
        } else {
            $licitar= new Licitar();
        }
        $licitar->user_id=$request->user_id;
        $licitar->leilao_id=$request->leilao_id;
        $licitar->valor=$request->valor;
        $licitar->estado=$request->estado;
        $licitar->save();
        return response()->json($licitar,200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $licitar= Licitar::find($id);
        return response()->json($licitar,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function apagar( $id)
    {
        //
        $licitar= Licitar::find($id);
        $licitar->delete();
        return response()->json(['result'=>true],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Licitar $licitar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Licitar $licitar)
    {
        //
    }
}
