<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class PremiumController extends Controller
{
    public function index(){
      return view ('premium');
    }

    public function unirse(){
      $user = User::where('id', Auth::user()->id)->first();
      $user->rol_id = 3;
      $user->save();
      return view ('home');
    }
}
