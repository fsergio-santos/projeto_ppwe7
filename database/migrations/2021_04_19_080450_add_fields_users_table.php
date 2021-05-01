<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsUsersTable extends Migration
{
   
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table->string('profile_pic')->nullable();
            $table->boolean('is_active')->default(0);
        });
    }

    
    public function down()
    {
        Schema:dropIfExists('users');
    }
}
