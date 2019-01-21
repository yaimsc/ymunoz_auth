<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Auth;
use App\User;
use Illuminate\Support\Facades\File;

class MessageController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(){
    $messages_enviados = Message::where('from', Auth::user()->email)->get();
    $messages_recibidos = Message::where('to', Auth::user()->email)->get();
    return view('messages.index', ['messages_enviados' => $messages_enviados,'messages_recibidos' => $messages_recibidos]);
  }

  public function create(){
      return view('messages.nuevoMensajeForm');
  }

  public function store(Request $request){

    //validate
    $request->validate([
      'to' => 'required|email',
      'message' => 'required',
    ]);

    //pillar datos del message
    $message = new Message;

    $message->from = Auth::user()->email;
    $message->to = $request->input('to');
    $message->title = $request->input('title');
    $message->message = $request->input('message');

    $file = $request->file('file');
    if($file == ''){
       $message->file = 'No hay archivo adjunto';
     }else{
       $extension = $file->getClientOriginalExtension();
       // Storage::disk('public')->put($foto->getFileName().'.'.$extension, File::get($foto));
       $message->file = $file->getFileName(). '.' .$extension;
       // $request->foto->storeAs($pathToFile);
     }
     $message->save();
     return $this->index();
  }

}
