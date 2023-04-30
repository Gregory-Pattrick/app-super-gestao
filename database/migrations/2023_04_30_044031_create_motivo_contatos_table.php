<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\MotivoContato;

class CreateMotivoContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivo_contatos', function (Blueprint $table) {
            $table->id();
            $table->string('motivo_contato', 20);
            $table->timestamps();
        });

        #Para inserir diretamente os dados pré definidos na tabela poderiamos usar:
        //MotivoContato::create(['motivo_contato' => 'Dúvida']);
        //MotivoContato::create(['motivo_contato' => 'Elogio']);
        //MotivoContato::create(['motivo_contato' => 'Reclamação']);

        #Obs. Mas por padronização usamos um seeder
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motivo_contatos');
    }
}
