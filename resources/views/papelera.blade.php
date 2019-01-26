@extends('layouts.mainud6')

@section('content')

<link rel="stylesheet" href="/css/messages/index.css">
<br>
<br>
<br>
<div class="container">
  <div class="table-responsive">
    @if(Session::has('borrado'))
    <div id="alert" class="alert {{ Session::get('alert-class', 'alert-danger') }} alert-dismissible fade show">
      <div>{{ Session::get('borrado') }}</div>
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
            <form action="{{ route('papelera.delete',$m->id) }}" method="post">
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
