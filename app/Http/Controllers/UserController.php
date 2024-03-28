<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function autenticar(Request $request){
        $user = User::where('email', $request->email)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['As Credencias inseridas estão erradas'],
            ]);
        }
        $token = $user->createToken("Bidbay")->plainTextToken;
        //return response()->json($user->createToken($request->device_name)->plainTextToken);
        return response()->json(["usuario"=>$user,"token"=>$token],200);
    }

    public function cadastro(Request $request){
        $user = null;
        if(isset($request->id)){
            $user = User::find($request->id);
        }else{
            $user = new User();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tipo = $request->tipo;
        $user->telefone = $request->telefone;
        $user->password = bcrypt($request->password);
        $user->save();
        $token = $user->createToken("Bidbay")->plainTextToken;
        return response()->json(["usuario"=>$user,"token"=>$token],200);
    }

    public function sair(){
        Auth::logout();
        return response()->json(200);
    }

    public function userAll(){
        $user = User::with('perfil')->get();
        return response()->json($user,200);
    }
}
