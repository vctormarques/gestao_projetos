<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    //
    protected $fillable = ['nome', 'data_inicial', 'data_final'];
    
    protected $dates = ['data_inicial', 'data_final'];

    public function atividade(){
        return $this->hasMany('App\Atividade');
    }

}
