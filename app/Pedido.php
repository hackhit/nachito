<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Pedido extends Model
{
	public $timestamps = false;

    protected $fillable = ['rutCliente','nombreTorta','cantPersonas','dedicatoria','cantidadTortas','estadoPedido','rutTrabajador','rutCompletado','fechaPedido','precioTotal','fechaEntrega','estadoPago','codigoCliente','horaEntrega'];    

}
