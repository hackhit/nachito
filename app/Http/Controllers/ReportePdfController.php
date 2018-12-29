<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Dompdf\Dompdf;
use Dompdf\Options;


class ReportePdfController extends Controller
{
    
    
   

 	public function reporte(){
       

       if (Session('sessionTrabajador')){

       	   return view('vistaReporte');
       } 




    }


     public function mejorCliente(Request $request){
 
      $fecha1 = $request['fecha1'];
      $fecha2 = $request['fecha2'];



       $mejorCliente = DB::table('pedidos')
       ->join('clientes','clientes.id', '=', 'pedidos.rutCliente')
       ->select('clientes.nombre', 'clientes.apellido', DB::raw('count(*) as cant'),DB::raw('sum(pedidos.precioTotal) as total'))
       ->whereBetween('pedidos.fechaPedido',[$fecha1,$fecha2])
       ->groupby('pedidos.rutCliente')
       ->orderby('total','Desc')
      ->take(10)    
       ->get();
        
        $fecha1 = date('d-m-Y',strtotime($fecha1));
        $fecha2 = date('d-m-Y',strtotime($fecha2));

  	//$view = \View::make('reporteCliente',compact([$mejorCliente,'mejorCliente',$fecha1,'fecha1',$fecha2,'fecha2']))->render();
    
   // $pdf = \PDF::loadView('reporteCliente',compact([$mejorCliente,'mejorCliente',$fecha1,'fecha1',$fecha2,'fecha2']));
        $pdf = new Dompdf();
		$pdf->set_option('defaultFont', 'Courier');
		$pdf->set_option('isHtml5ParserEnabled', true);
        

       // $view = \View::make('reporteCliente',compact([$mejorCliente,'mejorCliente',$fecha1,'fecha1',$fecha2,'fecha2']))->render();
        
	   $view = \View::make('reporteCliente',compact($mejorCliente,'mejorCliente',$fecha1,'fecha1',$fecha2,'fecha2'))->render();




        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHtml($view);
 

	 return $pdf->stream('reporteCliente.pdf');



    }

    public function mejorTrabajador(Request $request){

    $fecha1 = $request['fecha1'];
    $fecha2 = $request['fecha2'];

    $mejorTrabajador = DB::table('pedidos')
       ->join('trabajadores','trabajadores.id', '=', 'pedidos.rutTrabajador')
       ->select('trabajadores.nombre', 'trabajadores.apellido', DB::raw('count(*) as Preparaciones'))
       ->whereBetween('pedidos.fechaPedido',[$fecha1,$fecha2])
       ->where('pedidos.rutTrabajador','>','1')
       ->groupby('pedidos.rutTrabajador')
       ->orderby('Preparaciones','Desc')
      ->take(10)    
       ->get();

 		$fecha1 = date('d-m-Y',strtotime($fecha1));
        $fecha2 = date('d-m-Y',strtotime($fecha2));


 $pdf = new Dompdf();
		$pdf->set_option('defaultFont', 'Courier');
		$pdf->set_option('isHtml5ParserEnabled', true);
        

    
        
	   $view = \View::make('reporteTrabajador',compact($mejorTrabajador,'mejorTrabajador',$fecha1,'fecha1',$fecha2,'fecha2'))->render();




        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHtml($view);
 

	 return $pdf->stream('reporteTrabajador.pdf');







    }

    public function tortaMasVendida(Request $request){

           	$fecha1 = $request['fecha1'];
            $fecha2 = $request['fecha2'];

                $tortaMasVendida= DB::table('pedidos')
                   ->select('nombreTorta', DB::raw('count(*) as Tortas'))
                   ->whereBetween('pedidos.fechaPedido',[$fecha1,$fecha2])
                   ->groupby('nombreTorta')                   
                  ->take(10)    
                   ->get();
                
                 		$fecha1 = date('d-m-Y',strtotime($fecha1));
                    $fecha2 = date('d-m-Y',strtotime($fecha2));


                 $pdf = new Dompdf();
                		$pdf->set_option('defaultFont', 'Courier');
                		$pdf->set_option('isHtml5ParserEnabled', true);
                        

    
        
	   $view = \View::make('reporteTorta',compact($tortaMasVendida,'tortaMasVendida',$fecha1,'fecha1',$fecha2,'fecha2'))->render();




        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHtml($view);
 

	 return $pdf->stream('reporteTorta.pdf');







    }



}
