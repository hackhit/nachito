<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TortasMateriaPrima;
use App\Torta;
use Schema;
use DB;
use Session;
use App\MateriaPrima;
use Image;
use Illuminate\Support\Facades\Input;


class IngresoMateriaPrima extends Controller
{
    

	public function formIngresoInsumoTorta(){

		if (Session::has('sessionTrabajador')) {

			    $datosTortas = DB::table('tortas')->orderby('id')->get();
				$cantPer = DB::table('cantidadPersonas')->orderby('cantidad','asc')->get();
   			     $columns =  DB::getSchemaBuilder()->getColumnListing('tortasMateriaPrimas');

   			    
				return view('insumosTorta', compact('columns','datosTortas','cantPer'));  
		}

			

			
                       	                
     }



     public function ingresoInsumoTorta(Request $request){

           	 
            $columns 	 =  DB::getSchemaBuilder()->getColumnListing('tortasMateriaPrimas');	   
     	    $buscador	 = TortasMateriaPrima::where('tortaNombre',$request['tortaNombre'])->where('Cantidad_Personas',$request['Cantidad_Personas'])->first();
     	  	$datosTortas = DB::table('tortas')->orderby('id')->get();
			$cantPer     = DB::table('cantidadPersonas')->orderby('cantidad','asc')->get();

     	  if ($buscador) {
     	  	
                   flash('Ya fueron ingresados los insumos de esta torta')->error()->important();
                   return view('insumosTorta', compact('columns','datosTortas','cantPer'));  

     	  }else{
                      	 $colun =array();
							 foreach ($columns as $col) {
							 	  if ($col=="id") {
							 	  	# code...
							 	  }else{
							 	  	if ($request->$col=="") {
							 	  		$request->$col=0;
							 	  	}
							 	  
							 	  	$colun = array_add($colun,$col,$request->$col);  
							 	  }

							 	 					
						    }

					 TortasMateriaPrima::insert($colun);
					 flash('Insumos Ingresados Correctamente')->success()->important();
					 

					  $datosTortas = DB::table('tortas')->orderby('id')->get();
				return view('insumosTorta', compact('columns','datosTortas','cantPer')); 

     	  }
     	    	
					 
         
     	        	
     	}	

	




	public function verFormularioMateria(){
		$mat = MateriaPrima::all();
	    return view('ingresarMateriaPrima',compact($mat,'mat'));
	}
	
    		 


	public function ingresoNuevaMateriaPrima(Request $request){

		if (Session::has('sessionTrabajador')) {

				$nuevoIns = $request['nuevoIns'];
				 $nuevoIns = trim($nuevoIns);	
				 $nuevoIns = str_replace(' ', '', $nuevoIns);
				
		 		$columns =  DB::getSchemaBuilder()->getColumnListing('tortasMateriaPrimas');		 		
		 		$col = Schema::hasColumn('tortasMateriaPrimas',$nuevoIns);

				 		if ($col==true) {
				 			flash('Ya se encuentra este insumo')->error()->important();
				 		}else{  
							$cero=0;	
				            $sql = "alter table tortasMateriaPrimas add ".$nuevoIns." int DEFAULT ".$cero."";
				            DB::select($sql);
				            
				            MateriaPrima::create([
                             'Nombre' => $nuevoIns,
                             'stockCritico' => $request['stockCri']
				            ]);
				            flash('Insumo agregado correctamente')->success()->important();

				 		}

		 			
				 $mat = MateriaPrima::all();
				return view('precios',compact($mat,'mat'));

		}

		
		

	 }

	 public function nuevaTorta(Request $request){

	 		if (Session::has('sessionTrabajador')) {

	 			$nueva = $request['nuevaTorta'];
	 			$codTor = $request['codTorta'];  


					$foto = $request->file('imagen');
		            $nombreFoto = $foto->getClientOriginalName();
		            $img = \Image::make($foto);
		    		$img->resize(320, 240)->save(public_path('imagenes/'.$nombreFoto));
		    		$rutaFoto = 'imagenes/'.$nombreFoto;

	 			$ingreso = Torta::create([
	 					'Nombre'=>$nueva,
	 					'codigoTorta' =>$codTor,
	 					'Descripción' => $request['descripcion'],
	 					'Imagen' =>$rutaFoto
	 			]);
	 			flash('Torta Ingresada correctamente')->success()->important();
	 			 // return view('nuevaTorta');
	 			return redirect('/insumosTortas');

	 		}
	 }

	 public function nuevaTortaForm(){

	 	return view('nuevaTorta');
	 }




   






}




