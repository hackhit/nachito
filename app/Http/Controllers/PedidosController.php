<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Torta;
use Datetime;
use DB;
use App\CantidadPersona;
use App\TortasMateriaPrima;
use App\MateriaPrima;
use Session;
use Carbon\Carbon;
use Mail;



class PedidosController extends Controller
{

  

   public function ingresarPedido(Request $request){

          if (Session::has('miSessionRut')) {

          //cantidad Máxima de Pedidos por día, capacidad de producción diaria en la pasteleria= 30

            $cantMax = Pedido::where('fechaEntrega',$request['fechaEntrega'])->sum('cantidadTortas');

         

              if ($cantMax<=31) {

                  foreach (Session::get('miSessionRut') as $ses) {
                   $fechaHoy= new Datetime(); //Obtiene la fecha de hoy

                   $cont = Pedido::count('id');  //Cuenta la cantidad de pedidos, ya que se le suma 1 más abajo.                
                   $cod = Torta::select('codigoTorta')->where('id',$request['idTorta'])->first();  //Obtiene el código de la torta.
                    
                   $precio = DB::table('precios')
                     ->join('cantidadPersonas','cantidadPersonas.id', '=', 'precios.idCanPersonas')
                     ->select('precios.Precio')
                     ->where('idNombreTorta',$request['idTorta'])
                     ->where('cantidad',$request['cantPer'])       
                     ->first();                    
                                          
                   $cantTortas = $request['cantTortas'];                 

                      $precioTotal =  $precio->Precio * $cantTortas;
                      

                      $pedido = Pedido::create([
                        'rutCliente' =>$ses->id,
                        'nombreTorta'=>$request['nombreTorta'],
                        'cantPersonas'=>$request['cantPer'],
                        'dedicatoria'=>$request['dedicatoria'],
                        'cantidadTortas'=>$cantTortas,
                        'estadoPedido'=>1,
                        'fechaPedido'=>$fechaHoy,
                        'precioTotal'=>$precioTotal,
                        'estadoPago'=>1,   
                        'rutTrabajador'=>1,
                        'rutCompletado' =>1,
                        'codigoCliente'=>$cod->codigoTorta.($cont+1),
                        'horaEntrega' => $request['horaEntrega'],
                        'fechaEntrega' =>$request['fechaEntrega']
                        ]);
                      flash('Pedido Registrado Correctamente')->success()->important();  
                         $torta = Torta::all();    
                          return view('catalogo', compact($torta,'torta'));
                   
               
                }



              }else{
                    flash('No se pueden hacer más pedidos para la fecha '.Carbon::parse($request['fechaEntrega'])->format('d/m/Y').', por favor, ingrese una nueva')->error()->important(); 
                     $torta = Torta::all();    
                          return view('catalogo', compact($torta,'torta'));
                    
              }


      
             
          }else{
               return view('accesoCliente');
               }

        
      
   	 
    }//Cieera el método ingresarPedido




public function verPedidos(){
       
       if (Session::has('miSessionRut')) {

        
         foreach (Session::get('miSessionRut') as $ses) {
 
          $verPedidos = DB::table('pedidos')
                ->join('clientes','clientes.id', '=', 'pedidos.rutCliente')
                ->join('estadoPedidos','estadoPedidos.id','=','pedidos.estadoPedido')
                 ->join('estadoPagos','estadoPagos.id',"=",'pedidos.estadoPago')
                ->select('clientes.nombre as Cliente','clientes.apellido','pedidos.nombreTorta','codigoCliente','cantPersonas','dedicatoria','cantidadTortas','estadoPedidos.estado','fechaPedido','precioTotal','estadoPagos.nombre','fechaEntrega','horaEntrega')     
                ->where('pedidos.rutCliente',$ses->id)->get(); 
                return view('pedidos',compact($verPedidos,'verPedidos'));
       }

   }
}


   public function redirect(){
    return view('welcome');
   }


   public function cancelarPedido(Request $request){

      if (Session::has('sessionTrabajador')) {

         Pedido::find($request['cancelarPedido'])->update(['estadoPedido' => '5']);
        
         




  foreach (Session::get('sessionTrabajador') as $tra) {
                  
                $user = Pedido::find($request['cancelarPedido']);
                $user->rutCancelado = $tra->id;
                $user->save();
                                  
                }
        return $this->verPedidosTrabajador();


      }
     
   }

   public function formPedido(){
              if (Session::has('miSessionRut')) {
                  $torta =Torta::all();
                  $cantPer = CantidadPersona::all();  
                    return view('panel',[
                         'torta' =>$torta,
                         'cantPer' =>$cantPer,
                       ]);
              }else{
                 return view('welcome');
              }

    

   }

   public function verPedidosTrabajador(){

      if (Session::has('sessionTrabajador')) {
            $verPedidosTra = DB::table('pedidos')
          ->join('clientes','clientes.id', '=', 'pedidos.rutCliente')
          ->join('estadoPedidos','estadoPedidos.id','=', 'pedidos.estadoPedido')
          ->join('trabajadores','trabajadores.id','=','pedidos.rutTrabajador')        
          ->select('pedidos.id','clientes.nombre as cliente', 'clientes.apellido', 'pedidos.nombreTorta','pedidos.dedicatoria', 
            'pedidos.cantPersonas', 'estadoPedidos.estado','trabajadores.usuario as preparador','pedidos.fechaPedido', 'pedidos.cantidadTortas','pedidos.precioTotal',
            'pedidos.fechaEntrega','pedidos.codigoCliente','pedidos.horaEntrega')  
         
          ->orderBy('id')
          ->get();

        
       
          return view('pedidos',compact($verPedidosTra,'verPedidosTra'));
       
      }else{
        return view('accesoTrabajador');
      }
   }





   public function prepararPedido(Request $request){


      if (Session::has('sessionTrabajador')) { 

                $idPedido              =   $request['cambiarEstado'];
                $nombreTortaStock      =   $request['nombreTortaStock'];
                $cantidadTortas        =   $request['cantidadTortas'];
               
                $cantidadPersonasStock =   $request['cantidadPersonasStcok'];
                $idTorta               =   Torta::where('Nombre',$nombreTortaStock )->first();
                $idCantPers            =   CantidadPersona::where('cantidad',$cantidadPersonasStock)->first();
                
                $insumosUsados         =   TortasMateriaPrima::where('tortaNombre',$idTorta->id)->where('Cantidad_Personas',$idCantPers->id)->first();
                
               $insumoMenor = false;
               $correo = false;
                              

                $hoy = Carbon::now();

               
                 //Este método descuenta de la tabla materiasPrimas lo que se usó en cada Torta
                 $columns =  DB::getSchemaBuilder()->getColumnListing('tortasMateriaPrimas');



                 foreach ($columns as $colun) {
                    if ($colun=='id' || $colun=='tortaNombre' || $colun=='Cantidad_Personas' ) {
                      # code...
                    }else{
                          
                          $cantStock =  DB::table('materiaPrimas')->select('stock','id','Nombre','stockCritico')->where('Nombre', $colun)->first();
                         
                                                
                          $cantPedido =  $insumosUsados->$colun;
                          

                          $usoPorCantTorta = $cantPedido*$cantidadTortas;  
                                      
                        
                              if ($cantStock->stock < $usoPorCantTorta) {

                            flash('No es posible realizar el pedido, su stock de '.$cantStock->Nombre.' es de: '.$cantStock->stock. ' y necesita: '.$usoPorCantTorta)->error()->important();
                              $insumoMenor = true;
                              
                              
                              }else{


                                     $usado = ($cantStock->stock) - ($usoPorCantTorta);                                      
                                        
                               
                                        $cantUsada =  DB::table('materiaPrimas')->select('stock')->where('Nombre', $colun)->update(['stock' => $usado ]); 
                                        //Actualiza la tabla descontando lo que se usó
                                            $cantStocks =  DB::table('materiaPrimas')->select('stock','stockCritico')->where('Nombre', $colun)->first();
                                            if ( $cantStocks->stock < $cantStocks->stockCritico) {
                                             $correo = true;                                                 

                                            }

                                        if (  $cantPedido==0) {
                                          # code...
                                        }else{
                                            DB::table('salidas')->insert(['fechaSalida'=>$hoy,
                                                                       'codigoProducto'=>$cantStock->id,
                                                                        'cantidad'=>$usoPorCantTorta,
                                                                        'idPedido'=>$idPedido  ]);
                                             }

                                  }
                                
                                             
                          }                         


            }


        if ($insumoMenor==false) {
                            
                                   foreach (Session::get('sessionTrabajador') as $tra) {
                                  
                                $user = Pedido::find($request['cambiarEstado']);
                                $user->rutTrabajador = $tra->id;
                                $user->save();
                                      Pedido::find($request['cambiarEstado'])->update(['estadoPedido' => '2']);
                             
                                } 


                           } 



           if ($correo==true) {


                    try {

                       Mail::send('email',['title' => 'Prueba', 'message' => 'Revise Stock'], function ($message)
                                                                                   {
                                                                                    $message->from('pastelerianachitostock@gmail.com');
                                                                                    $message->to('claudgalaz@gmail.com')->subject('Stock Crítico');;
                                                                                  });

                      
                    } catch (Exception $e) {
                      flash('Revise su conexión a Internet por favor');
                    }

                    

           }

        return $this->verPedidosTrabajador();

           
      }  

   }




   public function completarPedido(Request $request){

      if (Session::has('sessionTrabajador')) {

        Pedido::find($request['completarPedido'])->update(['estadoPedido'=>'3']);

         foreach (Session::get('sessionTrabajador') as $tra) {
                  
                $user = Pedido::find($request['completarPedido']);
                $user->rutCompletado = $tra->id;
                $user->save();   
                }

          return $this->verPedidosTrabajador();
      }else{
        return view('accesoTrabajador');
      }

   }




  public function entregarPedido(Request $request){

      if (Session::has('sessionTrabajador')) {

        Pedido::find($request['entregarPedido'])->update(['estadoPedido'=>'4']);

        foreach (Session::get('sessionTrabajador') as $tra) {
                  
                $user = Pedido::find($request['entregarPedido']);
                $user->rutEntregado = $tra->id;
                $user->save();
                               
                }

           return $this->verPedidosTrabajador();
      }else{
        return view('accesoTrabajador');
      }

   }






public function revisarStockInsumo(Integer $id){


}






}



