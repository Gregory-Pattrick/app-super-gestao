<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal() {
        #Pegando os dados da tabela 'Motivo Contato'
        $motivo_contatos = MotivoContato::all();

        #Aqui estamos chamando uma view passando o primeiro parametro como um diretório a partir do diretório Web 
        #E o segundo parametro após o ponto é o nome do arquivo reduzido "principal" ou seja sem o '.blade.php'
        return view('site.principal', ['motivo_contatos' => $motivo_contatos]);
    }
}
