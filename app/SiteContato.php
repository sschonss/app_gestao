<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    //receber os dados do formulario
    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contatos_id' ,'mensagem'];

}
