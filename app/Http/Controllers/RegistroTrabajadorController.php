<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargo;
use App\Trabajador;
use Crypt;
use Hash;

class RegistroTrabajadorController extends Controller
{
    public function mostrarFormulario(){
    	$cargo = Cargo::all(); 
    	
    //	flash('HOLAAAAA')->warning()->important();	
    	return view('registroTrabajador', compact($cargo,'cargo'));

    }


    public function insertarTrabajador(Request $request){
          $cargo = Cargo::all(); 
         $count = Trabajador::where('rut', $request['rut'])->count();
        

          if ($count==1) {
               flash('Este Rut ya se encuentra registrado')->error()->important();    
          }else{

                if ($request['password']==$request['password2']) {
                                  $registro = Trabajador::create([
                        'rut' =>$request['rut'],
                        'nombre'=>$request['nombre'],
                        'apellido'=>$request['apellido'],
                        'telefono'=>$request['telefono'],
                        'email'=>$request['email'],  
                        'password'=>Crypt::encrypt($request['password']),
                        'cod_cargo'=>$request['cargo'],
                        'usuario' =>$request['usuario'],
                        
                        ]);
                      
                       flash('Trabajador Registrado Correctamente')->success()->important();

                }else{
                  flash('No coinciden las cointraseñas')->error()->important();    
                }
     
        
          }

	
           return view('registroTrabajador',compact($cargo,'cargo'));

    }
}
