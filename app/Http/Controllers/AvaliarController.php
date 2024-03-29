<?php

namespace App\Http\Controllers;

use App\Models\Avaliar;
use Illuminate\Http\Request;

class AvaliarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $avaliar=Avaliar::with(['user','produto'])->get();
        return response()->json($avaliar, 200);
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
        $avaliar=null;
        if (isset($request->id)) {
            # code...
            $avaliar=Avaliar::find($request->id);
        } else {
            # code...
            $avaliar=new Avaliar();
        }
        $avaliar->estrela=$request->estrela;
        $avaliar->produto_id=$request->produto_id;
        $avaliar->user_id=$request->user_id;
        $avaliar->save();
        return response()->json($avaliar, 200);

    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        $avaliar=Avaliar::with(['user','produto'])->find($id);
        return response()->json($avaliar, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function apagar( $id)
    {
        //
        Avaliar::find($id)->delete();
        return response()->json(['result'=>true], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Avaliar $avaliar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Avaliar $avaliar)
    {
        //
    }
}
