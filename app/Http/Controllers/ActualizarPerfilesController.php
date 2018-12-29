<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Trabajador;
use App\Cargo;
use DB;

class ActualizarPerfilesController extends Controller
{
    

	
	public function formActualizarPerfil(){


	if(Session('miSessionRut')){

			foreach (Session('miSessionRut') as $ses) {

	      

	     			 $datos = Cliente::all()->where('rut',$ses->rut);
	     			 return view('actualizarPerfiles',['datos' =>$datos]);
	        }
     
		}else if(Session('sessionTrabajador')){
			$cargo = Cargo::all();
			foreach (Session('sessionTrabajador') as $ses) {

				$datos = DB::table('trabajadores')
                   ->join('cargos','trabajadores.cod_cargo','=','cargos.id')
                    ->select('cargos.nombre as nombreCargo','trabajadores.rut','trabajadores.nombre',
                			 'trabajadores.apellido','trabajadores.telefono','trabajadores.email')
                  ->where('trabajadores.rut','=',$ses->rut)
                  ->get();

                  

      		return view('actualizarPerfiles',['datos' =>$datos],['cargo'=>$cargo]);

		}

 		}


}	


 public function actualizarPerfil(Request $request){
 
  if(Session('miSessionRut')){

	  	DB::table('clientes')

	            ->where('rut',$request['rut'])
	            ->update([
	            'nombre'=>$request['nombre'],
	            'apellido'=>$request['apellido'],
	            'telefono'=>$request['telefono'],
	            'email'=>$request['email'],]);
	    flash('Cliente Actualizado Correctamente, los cambios en la vista de la plataforma surgirán efecto en su próximo inicio de sesión. ')->success()->important();

	    $datos = Cliente::all()->where('rut',$request['rut']);
	     return view('actualizarPerfiles',['datos' =>$datos]);


  }else if(Session('sessionTrabajador')){

		DB::table('trabajadores')

	            ->where('rut',$request['rut'])
	            ->update([
	            'nombre'=>$request['nombre'],
	            'apellido'=>$request['apellido'],
	            'telefono'=>$request['telefono'],
	            'email'=>$request['email'],
	        	'cod_cargo'=>$request['cargo'],]);
	    flash('Trabajador Actualizado Correctamente, los cambios en la vista de la plataforma surgirán efecto en su próximo inicio de sesión. ')->success()->important();

	   $cargo = Cargo::all();
	   $datos = DB::table('trabajadores')
                   ->join('cargos','trabajadores.cod_cargo','=','cargos.id')
                    ->select('cargos.nombre as nombreCargo','trabajadores.rut','trabajadores.nombre',
                			 'trabajadores.apellido','trabajadores.telefono','trabajadores.email')
                  ->where('trabajadores.rut','=',$request['rut'])
                  ->get();
                   return view('actualizarPerfiles',['datos' =>$datos],['cargo'=>$cargo]);

  }


 }




}
