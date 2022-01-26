<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    //
    protected $fillable = ['nome', 'telefone', 'email', 'email', 'motivo_contatos_id', 'mensagem'];
}
