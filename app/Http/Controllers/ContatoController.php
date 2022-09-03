<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);

    }

    public function salvar(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:100'
        ],[
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve ter no mínimo 3 caracteres',
            'max' => 'O campo :attribute deve ter no máximo 40 caracteres',
            'email' => 'O campo :attribute deve ser um email válido',

            'mensagem.max' => 'A mensagem deve ter no máximo 100 caracteres',
            'motivo_contatos_id.required' => 'O motivo de contato deve ser preenchido'
         ]
        );

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
