<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CadastroController extends Controller
{
    public function view()
    {
        return view('cadastro.index');
    }

    public function cadastrar(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:usuarios',
        ]);

        if ($validator->fails()) {
            return redirect("/cadastrar")->with('msgf', 'E-mail já cadastrado na base de dados!');
        }

        $usuario = User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone1' => $request->telefone1,
            'telefone2' => $request->telefone2,
            'password' => Hash::make($request->password),
        ]);

        return redirect("/entrar")->with('msg', 'Usuário cadastrado com sucesso! Entre na sua conta.');
    }
}
