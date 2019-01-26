<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Auth;

class PapeleraController extends Controller
{
    public function index(){
      $messagesPapelera = Message::where('in', 'papelera')->orderBy('created_at', 'DESC')->get();
      return view('papelera', ['messagesPapelera' => $messagesPapelera]);
    }

    public function delete($id){
      $messagePapelera = Message::where('id', )->delete();
      return back()->with('borrado', 'Se ha borrado el mensaje definitivamente.');
      return redirect()->route('papelera.index');
    }
}
