<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class PremiumController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }

    public function index(){
      $user = User::where('id', Auth::user()->id)->first();
      return view ('premium', ['user' => $user]);

    }

    public function unirse(){
      $user = User::where('id', Auth::user()->id)->first();
      $user->rols()->attach(3); 
      $user->save();
      return view ('home');
    }
}
