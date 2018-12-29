<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Precio;
use DB;
use Session;

class PreciosController extends Controller
{
   public function verFormPrecios(){
   	 $datosTortas = DB::table('tortas')->orderby('id')->get();
	 $cantPer = DB::table('cantidadPersonas')->orderby('cantidad','asc')->get();

 $listadoPrecio = DB::table('precios')
			   					->join('cantidadPersonas','cantidadPersonas.id', '=', 'precios.idCanPersonas')
			   					->join('tortas','tortas.id', '=', 'precios.idNombreTorta')
			   					->select('idNombreTorta','Nombre','cantidad','Precio')
			   					->orderby('idNombreTorta','asc')
                                ->orderby('idCanPersonas','asc')
			   					->get();

              
   	return view('precios', compact('datosTortas','cantPer','listadoPrecio'));  
   }



   public function ingresoPrecios(Request $request){
    
   	 if (Session::has('sessionTrabajador')) {

               
              

   	 	        $buscador = Precio::where('idNombreTorta',$request['idTorta'])->where('idCanPersonas',$request['idCantPer'])->first();
   	 	        	 $datosTortas = DB::table('tortas')->orderby('id')->get();
			     	$cantPer = DB::table('cantidadPersonas')->orderby('cantidad','asc')->get();
			     	 $listadoPrecio = DB::table('precios')
			   					->join('cantidadPersonas','cantidadPersonas.id', '=', 'precios.idCanPersonas')
			   					->join('tortas','tortas.id', '=', 'precios.idNombreTorta')
			   					->select('idNombreTorta','Nombre','cantidad','Precio')
			   					->orderby('idNombreTorta','asc')
			   					 ->orderby('idCanPersonas','asc')
			   					->get();
			   

   	 	        if ($buscador) {
   	 	        	  flash('Ya fue ingresado este precio')->error()->important();
   	 	        	  return view('precios', compact('datosTortas','cantPer','listadoPrecio')); 
   	 	        }else{

				$guardar= Precio::create([
						'idNombreTorta' => $request['idTorta'],
						'idCanPersonas' => $request['idCantPer'],
						'Precio' => $request['precio']
				]);


			   flash('Precio Ingresado Correctamente')->success()->important();
			
			   
   			   $listadoPrecio = DB::table('precios')
			   					->join('cantidadPersonas','cantidadPersonas.id', '=', 'precios.idCanPersonas')
			   					->join('tortas','tortas.id', '=', 'precios.idNombreTorta')
			   					->select('idNombreTorta','Nombre','cantidad','Precio')
			   				    ->orderby('idNombreTorta','asc')
                                ->orderby('idCanPersonas','asc')
			   				    ->get();


  			    
				return view('precios', compact('datosTortas','cantPer','listadoPrecio')); 


   	 	        }

			 
		}

 			

   }



   public function actualizarPrecios(Request $request){

   }



   


}
