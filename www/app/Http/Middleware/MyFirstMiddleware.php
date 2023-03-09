<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MyFirstMiddleware
{
   
    private $users;

    public function __construct(User $users)
    {
        $this->users = $users;
    }

    public function handle(Request $request, Closure $next)
    {

        if($this->users->count() === 160) {
            // se a quantidade se usuários ativos for 16
            echo 'Achou exatos 16 registros: <br/>';
            dd($this->users->get());
        } else {
            echo 'ACHOU MAIS DE 16 REGISTROS NO MIDDLEWARE';
            $response = $next($request);
        }

        return $response;
       /*
        dd($this->users->get());
        if(!Auth::check())
            
            return $next($request);
        */    
        // Se não houver usuário logado, parar aqui
        dd('Usuário não logado');
    }
}
