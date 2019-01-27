<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }

    public function index(){
      $users = DB::table('users')->get();
      $messages = DB::table('messages')->get();
      return view('admin', ['users' => $users , 'messages' => $messages]);
    }
}
