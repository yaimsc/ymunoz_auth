<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Auth;

class PapeleraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $messagesPapelera = Message::where('in', 'papelera')->where('to', Auth::user()->email)->orWhere('from', Auth::user()->email)->orderBy('created_at', 'DESC')->get();
      return view('papelera', ['messagesPapelera' => $messagesPapelera]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
      $messagePapelera = Message::where('id', $id)->delete();
      $request->session()->flash('borrado', 'Se ha borrado el mensaje definitivamente.');
      // return back()->with('borrado', 'Se ha borrado el mensaje definitivamente.');
      return redirect()->route('papelera.index');
    }

    /*
    Remove all $messagesPapelera
    *
    */

    public function deleteall(){
      $messagesPapelera = Message::where('in', 'papelera')->delete();
      $request->session()->flash('borradoTotal', 'Se han borrado todos los mensajes de la papelera.');
      //return back()->with('borradoTotal', 'Se han borrado todos los mensajes de la papelera.');
      return redirect()->route('papelera.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
