<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MateriaPrima;
use Session;
use DB;
use Carbon\Carbon;
use Mail;


class StockController extends Controller
{

  public function revisarStock(){

  }




    public function sumarMateriaPrima(Request $request){

           

			  if (Session::has('sessionTrabajador')) {
			  			
             $total = MateriaPrima::all();  
             $hoy = Carbon::now();
           
                 foreach ($total as $ins) { 

                 		                	
                 		 $cantStock =  DB::table('materiaPrimas')->select('stock','id')->where('Nombre', $ins->Nombre)->first();
                         
                 		 $agregado = ($cantStock->stock) + ($request[$ins->Nombre]); 
                 		 $sumaStock =  DB::table('materiaPrimas')->select('stock')->where('Nombre', $ins->Nombre)->update(['stock' => $agregado ]);
                     
                        

                          if ($request[$ins->Nombre]==0) {
                          	# code...
                          }else{

                              DB::table('entradas')->insert(['fechaEntrada'=>$hoy,
                                                             'codigoProducto'=>$cantStock->id,
                                                             'cantidad'=>$request[$ins->Nombre]]);                          	
                          }

                 	}
               
				     
                 	 return redirect('/stock');
                 }

     }


   public function verFormStock(){
	  if (Session::has('sessionTrabajador')) {			  	
                   
                 $total = MateriaPrima::all();     
                        
   					return view('agregarStock',compact('total'));


			  }else{
			  	return redirect('/');
			  }

   }


   public function verEntradas(){
                 
                 if (Session::has('sessionTrabajador')) {
                 		$verMateriaEntradas = DB::table('entradas')
                 		->join('materiaPrimas','materiaPrimas.id', '=','entradas.codigoProducto' )
                 		->select('Nombre','cantidad','fechaEntrada')
                 		->orderby('fechaEntrada','desc')
                 		->orderby('Nombre')
                 		->get();
                 		
                 		
                 		return view('verEntradas',compact('verMateriaEntradas'));
                    
                     }else{
                     		return redirect('/');
                     }    

   }



   public function verSalidas(){



                
                 
                 if (Session::has('sessionTrabajador')) {
                 		$verMateriaEntradas = DB::table('salidas')
                 		->join('materiaPrimas','materiaPrimas.id', '=','salidas.codigoProducto' )
                 		->join('pedidos','pedidos.id','=','salidas.idPedido')
                 		->join('trabajadores','trabajadores.id','=','pedidos.rutTrabajador')
                 		->select('fechaSalida','codigoCliente','usuario','materiaPrimas.Nombre as Insumo','cantidad')
                 		->orderby('fechaSalida','asc')
                 		->orderby('codigoCliente','asc')
                 		->get(); 
                       
                 		return view('verSalidas',compact('verMateriaEntradas'));
                 		
                     }else{
                     		return redirect('/');
                     }    

   				}
           




}

















