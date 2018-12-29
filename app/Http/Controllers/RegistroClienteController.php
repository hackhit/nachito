<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListaNegra;
use App\Cliente;
use Crypt;
//use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDO;
use File;


class RegistroClienteController extends Controller
{
    public function mostrarFormulario(){ 
   

 //$command =  "mysqldump -u servitpc_nachito --password=nachito@2019 --opt servitpc_pasteleria > /home/servitpc/pasteleria/respaldo.sql"; Este es comando que sirve en el hosting



    	return view('registroCliente');

    }

   


    public function insertarCliente(Request $request){

           $count = Cliente::where('rut', $request['rut'])->count();
        

          if ($count==1) {
               flash('Este Rut ya se encuentra registrado')->error()->important();    
          }else{

               if ($request['password']==$request['password2']) {
                          $codigoCategoria=1;      
                    $registro = Cliente::create([
                    'rut' =>$request['rut'],
                    'nombre'=>$request['nombre'],
                    'apellido'=>$request['apellido'],
                    'telefono'=>$request['telefono'],
                    'email'=>$request['email'],
                    'password'=>Crypt::encrypt($request['password']),
                    'codigoCategoria'=>$codigoCategoria,
                    
                    ]);
          
           flash('Cliente Registrado Correctamente')->success()->important();
               }else{
                     flash('No coinciden las contraseñas')->error()->important();    
               }
             
             

           
          }

	
          		return view('registroCliente');


    }

    public function verClientes(){
      if (Session('sessionTrabajador')) {
            $clientes = CLiente::orderBy('apellido','ASC')->get(); 
            
           return view('verClientes',compact($clientes,'clientes'));
      }else{
          return view('accesoTrabajador');
      }

   
    }

 
public function eliminarCliente(Request $request){

       

        DB::table('clientes')
              ->where('id',$request['idCliente'])
              ->update([
              'codigoCategoria'=>2,
              'descripcon'=>$request['descripcion'],]);

      

        
        if (Session('sessionTrabajador')) {
            $clientes = CLiente::orderBy('apellido','ASC')->get();
          
           return view('verClientes',compact($clientes,'clientes'));
      }else{
          return view('accesoTrabajador');
      }
   
    }



    public function quitarCastigo(Request $request){



        DB::table('clientes')

              ->where('id',$request['quitarCastigo'])
              ->update([
              'codigoCategoria'=>1,
              'descripcon'=>null,]);

     

        
        if (Session('sessionTrabajador')) {
            $clientes = CLiente::orderBy('apellido','ASC')->get();  
           return view('verClientes',compact($clientes,'clientes'));
      }else{
          return view('accesoTrabajador');
      }
   
    }

}






