<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perfil = Perfil::with('user')->get();
        return response()->json($perfil,200);
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
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $perfil = Perfil::with('user')->find($id);
        return response()->json($perfil,200);
    }

   public function apagar($id){
    $perfil = Perfil::find($id)->delete();
    return response()->json($perfil,200);
   }
}
