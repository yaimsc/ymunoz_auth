@extends('layouts.mainud6')

@section('content')
<style media="screen">
  .container{
    display: inline-flex;
    flex-direction: row;
  }
  li{
    list-style: none;
  }
  li:hover{

  }
  .msg{
    padding: 10px;
    background-color: white;
    color: #0085BE;
    margin-bottom: 10px;
    margin-right: 10px;
    padding-left: 30px;
  }
  .msgPrss{
    padding: 10px;
    background-color: #007BFF;
    border-radius: 20px;
    margin-bottom: 10px;
    margin-right: 10px;
    padding-left: 30px;
    color: white;
  }
</style>
<br>
<br>
<br>
<div class="container">
  <div class="col-md-3">
    <ul>
      <li onclick="getRecibidos()" class="msgPrss" id="linkRecibidos">Mensajes Recibidos</li>
      <li onclick="getEnviados()" class="msg" id="linkEnviados">Mensajes Enviados</li>
    </ul>
  </div>
  <div class="col-md-9">
    <table class="table" id="recibidos">
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
       @foreach ($messages_recibidos as $m)
       <tr>
         <td>{{$m->from}}</td>
         <td>{{$m->title}}</td>
         <td>{{substr($m->message, 0, 30)}}{{strlen($m->message)>30?'...':''}}</td>
         <td>{{$m->file}}</td>
         <td>{{date("j/m/Y H:i:s", strtotime($m->created_at))}}</td>
       </tr>
       @endforeach
     </tbody>
    </table>
    <table class="table" id="enviados" hidden>
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
<script type="text/javascript">
  function getEnviados(){
    document.getElementById("recibidos").hidden = true;
    document.getElementById("enviados").hidden = false;
    document.getElementById("linkEnviados").classList.remove("msg");
    document.getElementById("linkEnviados").classList.add("msgPrss");
    document.getElementById("linkRecibidos").classList.remove("msgPrss");
    document.getElementById("linkRecibidos").classList.add("msg");
  }

  function getRecibidos(){
    document.getElementById("enviados").hidden = true;
    document.getElementById("recibidos").hidden = false;
    document.getElementById("linkEnviados").classList.remove("msgPrss");
    document.getElementById("linkEnviados").classList.add("msg");
    document.getElementById("linkRecibidos").classList.remove("msg");
    document.getElementById("linkRecibidos").classList.add("msgPrss");
  }
</script>
@endsection
