<?php

namespace App\Http\Middleware;

use Closure;
use Session;

use Illuminate\Support\Facades\Redirect;

class RutaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $administradores=Session::get('id_usuario');
        if($administradores){
            // $administradores=Session::get('id_usuario');
            if(empty($administradores)){
                return redirect('login');
            }
        }else{
            $clientes=Session::get('nombre_usuario');
            if(empty($clientes)){
                return redirect('login');
            }  
        }
        return $next($request);
    }
}
