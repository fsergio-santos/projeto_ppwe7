<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    protected $fillable = [
        'nome', 
    ];

    
    public function livros(){
        return $this->hasMany('App\models\Livro', 'editora_id');
    }
    
}
