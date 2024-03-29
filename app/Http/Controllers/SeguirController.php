<?php

namespace App\Http\Controllers;

use App\Models\Seguir;
use Illuminate\Http\Request;

class SeguirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $seguir=Seguir::with('user')->get();
        return response()->json($seguir, 200);
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
        $seguir=null;
        if (isset($request->id)) {
            # code...
            $seguir=Seguir::find($request->id);
        } else {
            # code...
            $seguir= new Seguir();
        }
        $seguir->seguido=$request->seguido;
        $seguir->seguidor=$request->seguidor;
        $seguir->save();
        return response()->json($seguir, 200);

    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        $seguir=Seguir::with('user')->find($id);
        return response()->json($seguir, 200);
    }

    public function apagar( $id)
    {
        //
        Seguir::find($id)->delete();
        return response()->json(['result'=>true], 200);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seguir $seguir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seguir $seguir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seguir $seguir)
    {
        //
    }
}
