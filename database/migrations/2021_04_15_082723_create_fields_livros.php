<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsLivros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->integer('autor_id')->unsigned();
            $table->foreign('autor_id')->references('id')->on('autors')->onDelete('cascade');
            $table->integer('editora_id')->unsigned();
            $table->foreign('editora_id')->references('id')->on('editoras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields_livros');
    }
}
