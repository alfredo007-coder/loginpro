<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  
    protected $table= 'evento';

    //
    protected $fillable = [
        'titulo', 'descripcion', 'fechaIngreso', 'fechaEgreso','estado',
    ];

    public $timestamps = false;

}
