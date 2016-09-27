<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['nombre', 'empresa','key', 'url', 'descripcion','logo','pais','region','direccion','telefono','correo','categoria_id','longitud','latitud'];

    public function categoria()
  	{
  		return $this->belongsTo('App\Categoria');
  	}
}