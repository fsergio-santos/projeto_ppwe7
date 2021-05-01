<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrosTable extends Migration
{
    
    public function up()
    {
        Schema::create('livros', function(Blueprint $table){
              $table->increments('id');
              $table->string('ano_edicao', 5);
              $table->string('titulo', 100);
              $table->date('data_cadastro');
              $table->timestamps();
        });
    }

     public function down()
    {
        Schema::dropIfExists('livros');
    }
}
