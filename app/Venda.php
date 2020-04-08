<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'vendas';
    protected $primaryKey = 'id';

    function usuario(){
    	return $this->belongsTo('App\Usuario', 'id_usuario', 'id');
    }

    public function clientes()
    {
        return $this->hasMany('App\Cliente', 'id_usuario', 'id');
    }
}
