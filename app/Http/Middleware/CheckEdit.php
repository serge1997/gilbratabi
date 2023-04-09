<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckEdit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        try{

            if( Auth::user()->funcao != 'administrador'){

                Auth::logout();
                return redirect()->route('logar')
                    ->with('err', "Você tentou de fazer uma tarefa restrita, sua sessão foi interopida");
            }

        }catch(\Exception $e){

            return redirect()->route('logar');
        }
        
        return $next($request);
    }
}
