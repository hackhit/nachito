<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
  protected $table = 'trabajadores';
  protected $hidden = ['password'];

 protected $fillable = ['nombre','rut','apellido','telefono','email','password','cargo','cod_cargo','usuario'];


}



 