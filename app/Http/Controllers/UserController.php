<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use Closure;



class UserController extends Controller
{

    //Método con str_shuffle() 
function generateRandomString($length = 10) { 
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
} 



	public function index($usuario)
	{
        $password=$this->generateRandomString(6);

        //$user=\App\Carpetas\Numerocarpeta::find($idCarpeta);
		//$carpeta->update(['numeroCarpeta'=>$data['datos_numero_carpeta']]);
         //$tableUser= DB::table('users');
         $hayUsuario=User::where("email",$usuario)->first();
         $passwordBase=Hash::make($password);
        if(!is_null($hayUsuario)){
            $hayUsuario->password=$passwordBase;
            $hayUsuario->save();
            return view('formularios.cambiarPassword',
            ['usuario' => $usuario,
            'password' =>  $password,
            'isUser' =>"Usuario Modificado Exitosamente"]);
        }
        else{
            return view('formularios.cambiarPassword',
            ['usuario' => $usuario,
            'password' =>  $password,
            'isUser' =>"No existe el usuario"]);
        }
        
    }
}