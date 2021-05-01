<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    
    protected $fillable = [
        'ano_edicao',
        'data_cadastro',
        'titulo','autor_id',
        'editora_id',
    ];


    public function autor(){
        return $this->belongsTo('App\models\Autor','autor_id');
    }


    public function editora(){
        return $this->belongsTo('App\models\Editora', 'editora_id');
    }




}
