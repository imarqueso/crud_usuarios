<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function view()
    {

        $usuarios = User::select(
            'usuarios.id',
            'usuarios.nome',
            'usuarios.password',
            'usuarios.email',
            'usuarios.telefone1',
            'usuarios.telefone2',
            'usuarios.created_at AS data_cadastro',
        )->get();

        return view('usuarios.index', compact('usuarios'));
    }

    public function excluir(Request $request, $id)
    {
        $usuario = User::find($id);

        $usuario->delete();

        return redirect('/usuarios')->with('msg', 'Usuário excluido com sucesso!');
    }
}
