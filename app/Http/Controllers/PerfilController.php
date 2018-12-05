<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 

class PerfilController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }
    public function perfil(){
    	return view ('perfil'); 
    }

    public function editarPerfil(Request $request){

    	$user = User::find($request->input('id')); 
    	$user->name = $request->input('name'); 
    	$user->email = $request->input('email');

    	$user->save(); 

    	return view('perfil'); 
    	
    }
}
