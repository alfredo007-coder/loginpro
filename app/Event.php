<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  
    protected $table= 'evento';

    //
    protected $fillable = [
        'fechaIngreso', 'fechaEgreso','estado','idPropiedad','nombre','email','wapp1','wapp2','cantPersonas','lugarResidencia'
    ];

    public $timestamps = false;

}
