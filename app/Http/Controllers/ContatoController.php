<?php

namespace App\Http\Controllers;

use App\SiteContato;
use App\MotivoContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato() {
        #Pegando os dados da tabela 'Motivo Contato'
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {
        #Realizando a validação dos dados do formulário recebidos
        $request->validate([
            'nome'               => 'required|min:3|max:40|unique:site_contatos',
            'telefone'           => 'required',
            'email'              => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem'           => 'required|max:2000'
        ],
        #Esse segundo parametro do validate serve para tratar as mensagens de erro
        #O parametro ':attribute' exibe o name do input
        [
            'required'     => 'Esse campo :attribute deve ser preenchido!',
            'min'          => 'Esse campo :attribute deve ter no minimo três caracteres', 
            'max'          => 'Esse campo :attribute deve ter menos de quarenta caracteres',
            'unique'       => 'Esse nome já está em uso',
            'email'        => 'O email precisa ser um email valido',
            'mensagem.max' => 'Esse campo deve ter no máximo dois mil caracteres'
        ]);

        #Chamando a classe responsável
        // $contato = new SiteContato();

        #Atribuindo os valores recebidos pelo formulário para suas respectivas váriaveis
        //$contato->nome           = $request->input('nome');
        //$contato->telefone       = $request->input('telefone');
        //$contato->email          = $request->input('email');
        //$contato->motivo_contato = $request->input('motivo_contato');
        //$contato->mensagem       = $request->input('mensagem');

        #Salvando os dados na tabela
        //$contato->save();

        #Outra forma de salvar os dados seria com o metodo 'fill'

        #Desta forma estamos preenchendo os atributos do objeto com um array associativo do 'request all'
        //$contato->fill($request->all());
        //$contato->save();

        #Também podemos usar o metodo create para criarmos o dado diretamente
        //$contato->crate($request->all());

        #Chamando direto a classe e metodo create
        SiteContato()::create($request->all());

        return redirect()->route('site.index');
    }
}
