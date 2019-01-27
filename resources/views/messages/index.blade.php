@extends('layouts.mainud6')

@section('content')
<link rel="stylesheet" href="/css/messages/index.css">
<br>
<br>
<br>
<div class="container">
  <div class="col-lg-3">
    <ul>
      <li onclick="getRecibidos()" class="msgPrss" id="linkRecibidos">Mensajes Recibidos</li>
      <li onclick="getEnviados()" class="msg" id="linkEnviados">Mensajes Enviados</li>
    </ul>
  </div>
  <div class="table-responsive">
    @if(Session::has('papelera'))
    <div id="alert" class="alert {{ Session::get('alert-class', 'alert-warning') }} alert-dismissible fade show">
      <div>{{ Session::get('papelera') }}</div>
    </div>
    @endif
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
         <td>
           <a id="show" href="{{route ('messages.show',$m->id)}}">
             <i class="fa fa-eye"></i>
             <label>Ver</label>
           </a>
           <form action="{{ route('messages.destroy',$m->id) }}" method="POST">
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
         <td>
           <a id="show" href="{{route ('messages.show',$m->id)}}">
             <i class="fa fa-eye"></i>
             <label>Ver</label>
           </a>
           <form action="{{ route('messages.destroy',$m->id) }}" method="POST">
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
