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
        $perfil=null;
        if (isset($request->id)) {
            $perfil=Perfil::find($request->id);
        } else {
            $perfil=new Perfil();
        }
        $perfil->nome_completo=$request->nome_completo;
        $perfil->nacionalidade=$request->nacionalidade;
        $perfil->provincia=$request->provincia;
        $perfil->moeda=$request->moeda;
        $perfil->municipio=$request->municipio;
        $perfil->bairro=$request->bairro;
        $perfil->zona=$request->zona;
        $perfil->user_id=$request->user_id;
        $perfil->save();
        return response()->json($perfil,200);
        
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
    Perfil::find($id)->delete();
    return response()->json(['result'=>true],200);
   }
}
