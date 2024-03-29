<?php

use App\Http\Controllers\{
    UserController,
    ProdutoController,
    CategoriaController,
    SubCategoriaController,
    VendedorController,
    LeilaoController,
    ImagemController,
    PerfilController,
    CarrinhoController,
    LicitarController,
    CompraController,
};
use App\Models\User;
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
    $user = User::with(['perfil','vendedor'])->find($request->user()->id);
    return response()->json($user, 200);
});

Route::post('user/auth',[UserController::class,'autenticar']);
Route::post('user',[UserController::class,'cadastro']);

Route::post('produto',[ProdutoController::class,'store']);
Route::get('produto',[ProdutoController::class,'index']);
Route::get('produto/{id}',[ProdutoController::class,'show']);
Route::get('produto/{id}/apagar',[ProdutoController::class,'apagar']);

Route::post('categoria',[CategoriaController::class,'store']);
Route::get('categoria',[CategoriaController::class,'index']);
Route::get('categoria/{id}',[CategoriaController::class,'show']);
Route::get('categoria/{id}/apagar',[CategoriaController::class,'apagar']);

Route::post('subCategoria',[SubCategoriaController::class,'store']);
Route::get('subCategoria',[SubCategoriaController::class,'index']);
Route::get('subCategoria/{id}',[SubCategoriaController::class,'show']);
Route::get('subCategoria/{id}/apagar',[SubCategoriaController::class,'apagar']);
#ROTA DO PERFIL
Route::post('perfil',[PerfilController::class,'store']);
Route::get('perfil',[PerfilController::class,'index']);
Route::get('perfil/{id}',[PerfilController::class,'show']);
Route::get('perfil/{id}/apagar',[PerfilController::class,'apagar']);
#ROTA DO CARRINHO
Route::post('carrinho',[CarrinhoController::class,'store']);
Route::get('carrinho',[CarrinhoController::class,'index']);
Route::get('carrinho/{id}',[CarrinhoController::class,'show']);
Route::get('carrinho/{id}/apagar',[CarrinhoController::class,'apagar']);
#ROTA DA COMPRA
Route::post('compra',[CompraController::class,'store']);
Route::get('compra',[CompraController::class,'index']);
Route::get('compra/{id}',[CompraController::class,'show']);
Route::get('compra/{id}/apagar',[CompraController::class,'apagar']);
#ROTA DO LEILAO
Route::post('leilao',[LeilaoController::class,'store']);
Route::get('leilao',[LeilaoController::class,'index']);
Route::get('leilao/{id}',[LeilaoController::class,'show']);
Route::get('leilao/{id}/apagar',[LeilaoController::class,'apagar']);
#ROTA DO LICITAR
Route::post('licitar',[LicitarController::class,'store']);
Route::get('licitar',[LicitarController::class,'index']);
Route::get('licitar/{id}',[LicitarController::class,'show']);
Route::get('licitar/{id}/apagar',[LicitarController::class,'apagar']);

Route::get('userAll',[UserController::class,'userAll']);

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