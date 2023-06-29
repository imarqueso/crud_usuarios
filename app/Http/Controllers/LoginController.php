<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginView(Request $request)
    {
        if (Auth::check()) {
            return redirect('/usuarios');
        } else {
            $mensagem = $request->session()->get('msgf');
            return view('login.index', ['msgf' => $mensagem]);
        }
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        $user = User::where('email', $request->input('email'))->first();

        if (Auth::attempt($credentials)) {
            return redirect('/usuarios');
        } else {
            $request->session()->flash('msgf', 'Login e/ou senha inválidos');
            return redirect()->back()->withErrors('Login e/ou senha inválidos');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/entrar');
    }
}
