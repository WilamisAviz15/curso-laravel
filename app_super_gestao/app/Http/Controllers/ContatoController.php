<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
       //var_dump($_POST);

        /*$contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        //print_r($contato->getAttributes());
        $contato->save();*/

        //$contato = new SiteContato();
        //$contato->create($request->all());
        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){
        //dd($request);
        $request->validate([
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:200'
        ],
        [
            'nome.min' => 'O campo nome precisa ter mais de 3 caracteres',
            'nome.max' => 'O campo nome precisa ter menos de 40 caracteres',
            'nome.unique' => 'Nome ja existe, escolha outro',
            'email.email' => 'O email informado não é válido',
            'mensagem.max' => 'O campo mensgaem precisa ter menos de 200 caracteres',
            'required' => 'O campo :attribute é obrigatório'
        ]
    );

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
