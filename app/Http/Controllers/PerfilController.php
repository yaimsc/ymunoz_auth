<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PerfilController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function perfil(Request $request){
      $cookie = $request->cookie('cookieyaiza');
    	return view ('perfil', ['cookie' => $cookie]);
    }

    public function editView(){
      return view('editarPerfil');
    }

    public function editarPerfil(Request $request){

    	$user = User::find($request->input('id'));
    	$user->name = $request->input('name');
    	$user->email = $request->input('email');

    	$user->save();

    	return view('home');

    }
}
