<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100);
            $table->string('pseudonimo',100);
            $table->date('data_nascimento');
            $table->string('sexo',1);
            $table->string('rg',20);
            $table->string('cpf',15);
            $table->string('endereco',100);
            $table->string('cep',15);
            $table->string('cidade',50);
            $table->string('bairro',50);
            $table->string('email',100);
            $table->string('telefone_celular',20);
            $table->string('telefone_fixo',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autors');
    }
}
