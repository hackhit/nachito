<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Storage;
use PDO;
use View;

class RespaldoController extends Controller
{
    
     public function verFormRepaldo(){

     	if (Session::has('sessionTrabajador')) {

     		$respaldos = File::glob('/home/vagrant/ProyectosLaravel/pasteleria/respaldos/*.sql');
			$respaldos = str_replace('/home/vagrant/ProyectosLaravel/pasteleria/respaldos/', '', $respaldos); // reemplaza los textos por espacio vacío
				
                
            return view('respaldo',compact('respaldos'));
     	}

     }




     public function crearRespaldo(){

     	if (Session::has('sessionTrabajador') || Session::has('sessionTrabajadorLocal') ) {

     		 $hoy = Carbon::now(); 
 			 $hoy = $hoy->format('d-m-Y');
         
				$command = "mysqldump pasteleria > /home/vagrant/ProyectosLaravel/pasteleria/respaldos/respaldo".$hoy.".sql"; // exportar base de datos

					// ejecución y salida de éxito o errores
					system($command,$output);
					if ($output==0) {
					flash("La base de datos fue creada correctamente en la carpeta /respaldos")->success()->important();

					}else{
					flash("Ha ocurrido un error en la creación del respaldo de la base de datos")->error()->important();;
					}



                 


			$respaldos = File::glob('/home/vagrant/ProyectosLaravel/pasteleria/respaldos/*.sql');
			$respaldos = str_replace('/home/vagrant/ProyectosLaravel/pasteleria/respaldos/', '', $respaldos); // reemplaza los textos por espacio vacío
				
                
            return view('respaldo',compact('respaldos'));

     	}
     }






     public function restaurar(Request $request){

  
     	if (Session::has('sessionTrabajador') || Session::has('sessionTrabajadorLocal')) {
 		
                   
					$host = "localhost";
				    $root = "homestead";
				    $root_password = "secret";
				    $databaseName = "pasteleria";

				    try {
				        $dbh = new PDO("mysql:host=$host", $root, $root_password);
				        
				        $dbh->exec('drop database pasteleria');

				        $dbh->exec('CREATE SCHEMA `' . $databaseName . '` DEFAULT CHARACTER SET utf8;') 
				        or die(print_r($dbh->errorInfo(), true));

                     $direccion = "/home/vagrant/ProyectosLaravel/pasteleria/respaldos/";
                     $respaldo = $request['nomRespaldo'];

                     $command= "mysql pasteleria < /home/vagrant/ProyectosLaravel/pasteleria/respaldos/".$respaldo.""; //Importar base de datos, para que funcione, debe existir la base de datos primero.
                   
                     system($command,$output);

                        if ($output==0) {
					flash("La base de datos fue restaurada correctamente")->success()->important();

					}else{
					flash("Ha ocurrido un error en la restauración de la base de datos");
					}

				    } catch (PDOException $e) {
				        die("ERROR EN LA CREACIÓN DE LA BASE DE DATOS ");
				    }

			$respaldos = File::glob('/home/vagrant/ProyectosLaravel/pasteleria/respaldos/*.sql');
			$respaldos = str_replace('/home/vagrant/ProyectosLaravel/pasteleria/respaldos/', '', $respaldos); // reemplaza los textos por espacio vacío
				
                
            //return redirect('respaldo',compact('respaldos'));
            return view('respaldo', compact('respaldos'));
              

     	}


     }


     public function eliminarRespaldo(Request $request){

     	if (Session::has('sessionTrabajador')) {
            $respaldo = $request['nombreResp'];

     		 File::delete(File::glob('/home/vagrant/ProyectosLaravel/pasteleria/respaldos/'.$respaldo .''));
             flash("respaldo borrado Correctamente");

             $respaldos = File::glob('/home/vagrant/ProyectosLaravel/pasteleria/respaldos/*.sql');
			$respaldos = str_replace('/home/vagrant/ProyectosLaravel/pasteleria/respaldos/', '', $respaldos); // reemplaza los textos por espacio vacío
				
                
            //return redirect('respaldo',compact('respaldos'));
            return view('respaldo', compact('respaldos'));

     	}

     	
     }





}





