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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $messages_enviados = Message::where('from', Auth::user()->email)->where('in' , 'inbox')->orderBy('created_at', 'DESC')->get();
      $messages_recibidos = Message::where('to', Auth::user()->email)->where('in', 'inbox')->orderBy('created_at', 'DESC')->get();
      return view ('messages.index', ['messages_enviados' => $messages_enviados,'messages_recibidos' => $messages_recibidos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('messages.nuevoMensajeForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

  //validate
  $request->validate([
    'to' => 'required|email',
  ]);
  //pillar datos del message
  $message = new Message;
  $message->from = Auth::user()->email;
  $message->to = $request->input('to');
  $title = $request->input('title');
  $texto = $request->input('message');
  if($title == ''){
    $message->title = 'Sin titulo';
  }else{
    $message->title = $title;
  }
  if($texto == ''){
    $message->message = 'Sin mensaje';
  }else{
    $message->message = $texto;
  }
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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $message=Message::find($id);
      return view ('messages.vista', ['message' => $message ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function delete($id){
    //   $message = Message::where('id', $id)-delete();
    //   return back()->with('papelera', 'Se ha borrado el mensaje de la entrada. Lo encontrará en la papelera.');
    //   return view('papelera', ['message' => $message]);
    // }

    public function destroy($id)
    {
      $papelera = 'papelera';
      $messagePapelera = Message::find($id);
      $messagePapelera->in = $papelera;
      $messagePapelera->save();
      return back()->with('papelera', 'Se ha borrado el mensaje de la entrada. Lo encontrará en la papelera.');
      return redirect()->action('PapeleraController@index');
    }
}
