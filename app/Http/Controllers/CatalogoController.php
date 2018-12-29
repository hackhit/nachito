<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Torta;
Use App\Precio;
Use DB;
use Carbon\Carbon;

class CatalogoController extends Controller
{
  public function mostrarCatalogo(){

    $torta = Torta::all();    
    return view('catalogo', compact($torta,'torta'));

  }


  public function mostrar($id){

			  	if (Torta::find($id)) {
			  		  			$tortaCatalogo  = Torta::where('id',$id)->first(); 
			  		  						   
							 $canP = DB::table('precios')
							       ->join('cantidadPersonas','cantidadPersonas.id', '=', 'precios.idCanPersonas')
							       ->select('cantidadPersonas.cantidad','precios.Precio')
							       ->where('idNombreTorta',$id)       
							       ->get();

                 $fechaHoy= Carbon::now();				 
				 $fechaMañana = $fechaHoy->addDay(2);
				 $fechaMañana = $fechaMañana->format('Y-m-d');

				 $fechaProxMes = $fechaHoy->addMonth(2);				
				 $fechaProxMes = $fechaProxMes->format('Y-m-d');


                 
			     return view('tortaCatalogo', compact('tortaCatalogo','canP','fechaMañana','fechaProxMes'));
			  	
			  			}


  	 
   

  }








  

}
