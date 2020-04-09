<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Propietario;
use Session;
use Redirect;
use Cache;
use Cookie;
class ApiAdministradorController extends Controller
{
    //
    public function validar(Request $request){
                            //campos
    	$usuario = $request->usuario;
    	$password = $request->contrasenia;

    	$resp = Usuario::where('usuario','=',$usuario)
    	->where('password','=',$password)
    	->get();
    		
         
    	if(count($resp)>0)
    	{
            $us=$resp[0]->nombre.' '.$resp[0]->apellidop.' '.$resp[0]->apellidom;
    		Session::put('usuario',$us);
    		Session::put('rol',$resp[0]->rol->rol);
            // Session::put('foto',$resp[0]->foto);
            Session::put('id_usuario',$resp[0]->id_usuario);
    		if($resp[0]->rol->rol == "Administrador")
    			return Redirect::to('perfil');
    		elseif ($resp[0]->rol->rol =="Vendedor") 
    			return Redirect::to('perfilvendedor');
    	}else{
            
            $usuario = $request->usuario;
            $password = $request->contrasenia;
            
            $prop = Propietario::where('nombre_usuario','=',$usuario)
            ->where('password','=',$password)
            ->get();

           

            if(count($prop)>0)
            {
                $use=$prop[0]->nombre.' '.$prop[0]->apellidop;
                Session::put('usuario',$use);
                Session::put('rol',$prop[0]->rol->rol);
                // Session::put('foto',$prop[0]->foto);
                Session::put('nombre_usuario',$prop[0]->nombre_usuario);
                if($prop[0]->rol->rol=="Cliente")
                    return Redirect::to('perfilpropietario');
            }
        }
        
    }

    public function salir(){
        Session::flush();
        Session::reflash();
        Cache::flush();
        Cookie::forget('laravel_session');
        unset($_COOKIE);
        unset($_SESSION);
        return Redirect::to('/');
    }
}
