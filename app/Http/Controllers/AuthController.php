<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function index(){

    }

    public function store(Request $request){
    	if (Auth::attemp([
          'rut' =>$request['rut'],
          'password' =>$request['password']
    	])) {
    		dd('Inicio Sesion');
    	}

    }
}
