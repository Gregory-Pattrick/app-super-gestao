<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #Populando uma tabela com uma Sedeer de forma 'manual'
        // $contato = new SiteContato();
        // $contato->nome = 'Sistema SG';
        // $contato->telefone = '(11) 9999-8888';
        // $contato->email = 'contato@sg.com.br';
        // $contato->motivo_contato = 1;
        // $contato->mensagem = 'Seja bem-vindo ao sistema Super Gestão';
        // $contato->save();

        #Populando uma tabela com uma Factory de forma 'automatica'
        #O primeiro parametro é a classe
        #O segundo parametro é a quantidade de registro que essa factory irá popular na tabela
        factory(SiteContato::class, 100)->create();
    }
}
