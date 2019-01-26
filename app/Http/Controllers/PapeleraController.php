<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class PapeleraController extends Controller
{
    public function index(){
      $messagesPapelera = Message::where('in', 'papelera')->orderBy('created_at', 'DESC')->get();
      return view('papelera', ['messagesPapelera' => $messagesPapelera]);
    }
}
