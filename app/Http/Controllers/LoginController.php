<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('site.login');
    }

    public function autenticar(Request $request)
    {
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuário precisa ser um e-mail válido',
            'senha.required' => 'A senha é obrigatória'
        ];

        $request->validate($regras, $feedback);


        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();
        $existe = $user->where('email', $email)->where('password', $password)->get()->first();

        if (isset($existe->name)) {
            echo "Usuário autenticado com sucesso!";
        }else{
            redirect()->route('site.login')->with('erro', 'Usuário ou senha inválidos');
        }







    }
}
