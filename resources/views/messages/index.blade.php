@extends('layouts.mainud6')

@section('content')
<style media="screen">
  .container{
    display: inline-flex;
    flex-direction: row;
  }
</style>
<br>
<br>
<br>
<div class="container">
  <div class="col-md-3">
    <a href="#">Mensajes Recibidos</a>
    <a href="#">Mensajes Enviados</a>
  </div>
  <div class="col-md-9">
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <table class="table">
      <thead>
        <tr>
          <th>Para</th>
          <th>Titulo</th>
          <th>Mensaje</th>
          <th>Archivo Adjunto</th>
          <th>Fecha/Hora</th>
          <th style="width:15px"></th>
          <th style="width:15px"></th>
          <th style="width:15px"></th>
        </tr>
      </thead>
      <tbody>
       @foreach ($messages_enviados as $m)
       <tr>
         <td>{{$m->to}}</td>
         <td>{{$m->title}}</td>
         <td>{{substr($m->message, 0, 30)}}{{strlen($m->message)>30?'...':''}}</td>
         <td>{{$m->file}}</td>
         <td>{{date("j/m/Y H:i:s", strtotime($m->created_at))}}</td>
       </tr>
       @endforeach
     </tbody>
    </table>
  </div>
</div>
@endsection
