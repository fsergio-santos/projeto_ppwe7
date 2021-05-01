<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
 
    protected $fillable = [
        'nome', 
        'pseudonimo', 
        'data_nascimento', 
        'sexo', 
        'rg', 
        'cpf', 
        'endereco', 
        'cep', 
        'cidade', 
        'bairro', 
        'email', 
        'telefone_celular', 
        'telefone_fixo',
    ];

    protected $hidden = [
        'created_at', 
        'updated_at', 
    ];


    public function livros(){
        return $this->hasMany('App\models\Livro','autor_id');
    }



    
}
