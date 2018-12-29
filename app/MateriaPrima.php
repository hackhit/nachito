<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaPrima extends Model
{
       public $timestamps = false;
       protected $table ='materiaPrimas';
       protected $fillable = ['Nombre','stockCritico','stock'];
}
