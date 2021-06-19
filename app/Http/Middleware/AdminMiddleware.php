<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Configuration;
use App\Models\User;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /*$u=User::where("id_rol","=","2")->get();
        $rol;
        foreach($u as $e){
            $rol=$e->id_rol;
        }
      
       return $rol;// $next($request);
        /*return $next($request);
        
         return redirect("/");
        */
        return $next($request);
    }
}
