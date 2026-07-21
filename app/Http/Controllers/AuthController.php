<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        $auth = Auth::check();
        if($auth){
            return redirect('/')->with('msg', 'Você já está logado!');
        }
        return view("auth.login", ['auth' => $auth]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:5', 'max:12']
        ],[
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email deve ser um email válido',
            'password.required' => 'O campo senha é obrigatório',
            'password.min' => 'A senha deve ter no mínimo 5 caracteres',
            'password.max' => 'A senha deve ter no máximo 12 caracteres'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('msg', 'Login realizado com sucesso!');
        } else {
            return back()->withErrors([
                'wrong' => 'Email ou Senha incorretos'
            ])->withInput();
        }

    }

    public function logout(Request $request)
    {
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
        return redirect('/')->with('msg', 'Logout realizado com sucesso!');
    }

}
