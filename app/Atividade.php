<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $fillable=['projeto_id', 'nome', 'data_inicial', 'data_final', 'finalizada', 'status'];

    protected $dates = ['data_inicial', 'data_final'];
    
    function projeto() {
        return $this->belongsTo('App\Projeto');
    }
}
