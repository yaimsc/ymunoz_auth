@extends('layouts.mainud6')

@section('content')

<link rel="stylesheet" href="/css/messages/index.css">
<style media="screen">
  button[type=submit]{
    background-color: #ff7272;
    color: white;
    width: 90px;
    padding: 8px;
    margin: 5px;
    margin-left: 20px;
    -webkit-box-shadow: 5px 5px 20px -5px rgba(0,0,0,0.43);
    -moz-box-shadow: 5px 5px 20px -5px rgba(0,0,0,0.43);
    box-shadow: 5px 5px 20px -5px rgba(0,0,0,0.43);
    border: none;
    cursor: pointer;
  }
</style>
<br>
<br>
<br>
<div class="container">
  <div class="table-responsive">
    @if(Session::has('borrado'))
    <div id="alert" class="alert {{ Session::get('alert-class', 'alert-danger') }}">
      <div>{{ Session::get('borrado') }}</div><i class="fa fa-times" onclick="cerrar()"></i>
    </div>
    @endif
    @if(Session::has('borradoTotal'))
    <div id="alert" class="alert {{ Session::get('alert-class', 'alert-danger') }}">
      <div>{{ Session::get('borradoTotal') }}</div><i class="fa fa-times" onclick="cerrar()"></i>
    </div>
    @endif
    <table class="table">
      <thead>
        <th>Para</th>
        <th>Titulo</th>
        <th>Mensaje</th>
        <th>Archivo Adjunto</th>
        <th>Fecha/Hora</th>
        <th></th>
      </thead>
      <tbody>
        @foreach ($messagesPapelera as $m)
        <tr>
          <td>{{$m->to}}</td>
          <td>{{$m->title}}</td>
          <td>{{substr($m->message, 0, 30)}}{{strlen($m->message)>30?'...':''}}</td>
          <td>{{$m->file}}</td>
          <td>{{date("j/m/Y H:i:s", strtotime($m->created_at))}}</td>
          <td>
            <form action="{{ route('papelera.destroy',$m->id) }}" method="post">
              {{ method_field('DELETE') }}
              @csrf
            <button type="submit" id="delete">
               <i class="fa fa-trash-o"></i><label>Borrar</label>
             </button>
           </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <form action="{{ route('papelera.deleteall') }}" method="post">
    @csrf
  <button type="submit">
     <i class="fa fa-trash-o"></i><label>Borrar todos los mensajes</label>
   </button>
  </form>
</div>
