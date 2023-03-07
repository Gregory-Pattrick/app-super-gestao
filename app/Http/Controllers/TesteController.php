<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    #recebendo e utilizando os parâmetros recebidos da url (rota)
    public function teste(int $a, int $b){
        // echo "A soma de $a + $b é: " .($a+$b);

        #Enviando os parâmetros para a view
        #Existem três formas de realizar esse envio sendo elas:
        #array associativo, compact() e com with().

        #formato de array associativo
        // return view('site.teste', ['a' => $a, 'b' => $b]);

        #formata compact()
        return view('site.teste', compact('a', 'b'));

        #formato with()
        // return view('site.teste')->with('a', $a)->with('b', $b);
    }
}
