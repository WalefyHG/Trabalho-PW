<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function authenticate(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if(!auth()->attempt($credentials)){
            return redirect()->route('/')->with('error', 'E-mail ou senha incorretos!');
        }

        $user = auth()->user();

        if($user->role === 'admin'){
            return redirect()->route('dashboard');
        }
        
        return redirect()->route('home')->with('error', 'Você não tem permissão para acessar essa página!');

        
    }


    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Logout realizado com sucesso!');
    }
}
