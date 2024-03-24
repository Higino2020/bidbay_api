<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;
use Plank\Mediable\Facades\MediaUploader;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user/auth',[UserController::class,'autenticar']);
Route::post('user',[UserController::class,'cadastro']);


Route::get('getfile/{nome}',function($name){
        $path = null;
    //$media = Media::whereBasename($name)->first();
    $media = MediaUploader::whereBasename($name)->first();

    if ($media != null) {
        $path = $media->getDiskPath();
    } else {
        $path = 'default.png';
    }
    $img = Image::make($media->getAbsolutePath());
    $w = 1024;
    $h = null;

    if (request()->w != null) {
        $w = request()->w;
    }
    if (request()->h != null) {
        $h = request()->h;
    }
    // resize the image to a width of 300 and constrain aspect ratio (auto height)
    $img->resize($w, $h, function ($constraint) {
        $constraint->aspectRatio();
    });
    $img->stream();
    //Log::debug(storage_path() . '/app/' . $path);
    return (new Response($img->__toString(), 200))->header('Content-Type', 'image/*');
});