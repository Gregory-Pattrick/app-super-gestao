<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #Uma forma de fazer o registro de uma seeder seria está: 
        #Instanciando o objeto
        $fornecedor = new Fornecedor();

        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com.br';

        $fornecedor->save();

        #Outa forma de fazer o registro de uma seeder seria está:
        #Utilizando o metodo Create
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor200.com.br',
            'uf' => 'RS',
            'email' => 'contato@fornecedor200.com.br'
        ]);

        #Outa forma de fazer o registro de uma seeder seria está:
        #Utilizando o insert 
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'fornecedor300.com.br',
            'uf' => 'SP',
            'email' => 'contato@fornecedor300.com.br'
        ]);

        //Obs. O metodo Insert não popula as colunas 'created_at' e 'updated_at' no banco de dados.
    }
}
