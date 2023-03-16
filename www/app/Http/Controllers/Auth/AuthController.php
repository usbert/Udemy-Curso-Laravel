<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginStoreRequest;

class AuthController extends Controller
{
    public function formRegister()
    {
        return view('auth.register');
    }

    public function formLogin() {

        // Antes de ir para o login, verifique se já existe a sessão ativa
        if(Auth::check())
            return redirect()->route('user.index');

        // Senão vai para tela de login
        return view('auth.login');
    } 

    public function login(LoginStoreRequest $request) {
        
        // Validate teste no LoginStoreRequest se os dados estão no padrão aceito
        $credentials = $request->validate();
        
        if(Auth::attempt($credentials)) 
        {
            // regenerar o login do usuário
            $request->session()->regenerate();
            // Usuário está logado, vai para o index
            return redirect()->intended('user.index');
        }

        // Se não estiver logado vai para o login
        return redirect()->route('login');


    } 

    public  function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }

}
