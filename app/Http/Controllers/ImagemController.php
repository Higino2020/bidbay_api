<?php

namespace App\Http\Controllers;

use App\Models\Imagem;
use Illuminate\Http\Request;
use Plank\Mediable\Facades\MediaUploader;

class ImagemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $img = Imagem::all();
        return response()->json($img, 200);
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
        $img = new Imagem();
        if (request()->hasFile('imagem')) {
            $media = MediaUploader::fromSource(request()->file('imagem'))
                ->toDirectory('imagem/extra')->onDuplicateIncrement()
                ->useHashForFilename()
                ->setAllowedAggregateTypes(['image/*'])->upload();
            $img->imagem = $media->basename;
        }
        $img->produto_id = $request->produto_id;
        $img->save();
        return response()->json($img, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(['img'=>Imagem::find($id)], 200);
    }

   public function apagar($id){
        Imagem::find($id)->delete();
        return response()->json(['result'=>true], 200);
   }
}
