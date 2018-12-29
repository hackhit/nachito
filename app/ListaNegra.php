<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaNegra extends Model
{	
	public $timestamps = false;
    protected $table="listaNegras";
    protected $fillable = ['idCliente'];
}
