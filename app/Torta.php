<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Torta extends Model
{
   
    public $timestamps = false;
    protected $fillable = ['Nombre','codigoTorta','Descripción','Imagen'];
	 


    
}
