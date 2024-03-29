<?php

namespace App\Http\Controllers;

use App\Models\Gosto;
use Illuminate\Http\Request;

class GostoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $gosto=Gosto::with(['produto'])->get();
        return response()->json($gosto,200);
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
        //
        $gosto=Gosto::with(['produto'])->find($id);
        return response()->json($gosto,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gosto $gosto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gosto $gosto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gosto $gosto)
    {
        //
    }
}
