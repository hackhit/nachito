<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Cliente as Authenticatable;

class Cliente extends Model
{
    protected $fillable = ['rut','nombre','apellido','telefono','email','password','codigoCategoria'];
}
