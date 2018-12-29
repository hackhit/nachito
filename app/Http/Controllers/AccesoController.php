<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Torta;
use App\CantidadPersona;
use Session;
use App\Trabajador;
use DB;
use Auth;
use Crypt;
use Hash;
use File;


class AccesoController extends Controller
{
    public function formAccesoCliente(Request $request){  
      $se = $request->session()->exists('miSessionRut');
      

      if ($se==true) {

         $torta =Torta::all();
          $cantPer = CantidadPersona::all();
        return view('catalogo',[
                  'torta' =>$torta,
                  'cantPer' =>$cantPer,
                  ]);
        
      }else{
          return view('accesoCliente');
      }
      
      
      
                	
    }

    public function accesoCliente(Request $request){


        $acceso = false; 

        $rut = $request['rut'];
        $clien = Cliente::where('rut', $request['rut'])->first();

         if (is_null($clien)) {

         
         }else{
             
                if ($rut == $clien->rut && $request['password']==Crypt::decrypt($clien->password)&&$clien->codigoCategoria==1) {

              $acceso=true;
         }

         }
       
        if ($acceso==true) {
        
                 $datos = DB::table('clientes')
                   ->join('categoriaClientes','clientes.codigoCategoria','=','categoriaClientes.id')
                    ->select('clientes.id','clientes.nombre as cliente','clientes.rut','categoriaClientes.nombre','clientes.apellido','clientes.telefono','clientes.email')
                  ->where('clientes.rut','=',$rut)
                  ->get();

      
                Session::put('miSessionRut',$datos);   
                 $torta =Torta::all();
                 $cantPer = CantidadPersona::all();

              return view('catalogo',[
                  'torta' =>$torta,
                  'cantPer' =>$cantPer,
                  ]);


        }else{

            if ($clien->codigoCategoria==2) {
              flash('Usted no tiene permitido el acceso por el siguiente motivo :')->error()->important();
              flash($clien->descripcon)->error()->important();     
          return view('accesoCliente');

            }

        	      flash('NO existe este Cliente')->error()->important();    
        	return view('accesoCliente');
        }
    	
    }




     public function accesoTrabajador(Request $request){


 $pass="eyJpdiI6ImF5aENYTG9JM1FKWHVHYzBCc0hKdEE9PSIsInZhbHVlIjoiNnBRXC9UNHVDaDZEeWk5UkJGNXY5VDVFRGFQRGk1TEVHeCtrUVkyTlBqeFU9IiwibWFjIjoiMmI1ZmMwYWM0MjU1NDdjNDJmOGNlNzAyNzZkNDBlZDU2MDk1YTkyNDU3MDZjMjEwOTE5NmE3ZThlZjJlYmNlYSJ9";
 

           
                     if ($request['rut'] == 'localAdmin' && $request['password']==Crypt::decrypt($pass)) {
                  
                  $datos = $request['rut'];
            
              Session::put('sessionTrabajadorLocal',$datos);

             $respaldos = File::glob('/home/vagrant/ProyectosLaravel/pasteleria/respaldos/*.sql');
             $respaldos = str_replace('/home/vagrant/ProyectosLaravel/pasteleria/respaldos/', '', $respaldos); // reemplaza los textos por espacio vacío

            return view('respaldoLocal',compact('respaldos'));

            }else{
     

                     $acceso=false;
                     $rut = $request['rut'];     

                     $tra = Trabajador::where('rut', $request['rut'])->first();
                     
                          if (is_null($tra)) {         

                          }else{

                            if ($rut==$tra->rut && $request['password']==Crypt::decrypt($tra->password)) {
                                 $acceso=true;
                            }
                            
                          }

                     if ($acceso==true) {
                      $datos = Trabajador::all()->where('rut',$request['rut']);          
                             Session::put('sessionTrabajador',$datos);  
                             return view('panel');
                     }else{
                       flash('NO existe este Trabajador')->error()->important();    
                      return view('accesoTrabajador');
                     }



                  }









             /*   
       
           
         $acceso=false;
         $rut = $request['rut'];
         $tra = Trabajador::where('rut', $request['rut'])->first();

        if (is_null($tra)) {
         
        }else{


          if ($rut==$tra->rut && $request['password']==Crypt::decrypt($tra->password)) {
               $acceso=true;
          }
          
        }


         if ($acceso==true) {
          $datos = Trabajador::all()->where('rut',$request['rut']);          
                 Session::put('sessionTrabajador',$datos);
                

             
                 return view('panel');
         }else{
           flash('NO existe este Trabajador')->error()->important();    
          return view('accesoTrabajador');
         }



    
*/


     }



     public function formAccesoTrabajador(Request $request){

      $seTra = $request->session()->exists('sessionTrabajador');
      
  
      if ($seTra==true) {
              return view('panel');
        
        
      }else{
          return view('accesoTrabajador');
      }

     }



    public function cerrarSesion(){     
    
       Session::flush();
       return redirect('/');
    }

    public function formInicioSesion(Request $request){

     return view ('inicioSesion');
    }

}



