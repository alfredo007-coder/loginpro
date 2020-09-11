<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
  
    protected $table= 'propiedad';

    //
    protected $fillable = [
        'id', 'nombre', 'color', 'detalles','estado'
    ];

    public $timestamps = false;

}
