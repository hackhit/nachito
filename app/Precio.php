<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
         public $timestamps = false;
   		protected $fillable = ['idNombreTorta','idCanPersonas','Precio'];  //
}
