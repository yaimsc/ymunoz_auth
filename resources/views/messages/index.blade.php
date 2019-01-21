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
          <th>Id</th>
          <th>Para</th>
          <th>Titulo</th>
          <th>Mensaje</th>
          <th>Fecha/Hora</th>
          <th style="width:15px"></th>
          <th style="width:15px"></th>
          <th style="width:15px"></th>
        </tr>
      </thead>
      <tbody>
       @foreach ($messages_recibidos as $m)
       <tr>
         <td>{{$m->id}}</td>
         <td>{{$m->userfrom->name}}</td>
         <td>{{substr($m->message, 0, 30)}}{{strlen($m->message)>30?'...':''}}</td>
         <td>{{date("j/m/Y H:i:s", strtotime($m->created_at))}}</td>
         <td>
         <a href="{{route ('messages.show',$m->id)}}"><i class="fa fa-eye" style="color:green"></i>{{ __('De') }}</a>
         </td>
         <td>
           <a href="{{route ('messages.response',$m->id)}}"><i class="fa fa-share"></i>Responder</a>
         </td>
         <td>
         <form style="display:inline" action="{{ route('messages.destroy',$m->id) }}" method="POST">
            {{ method_field('DELETE') }}
            @csrf
            <button type="submit" id="delete" style="background: none;padding: 0px;border: none;color:red">
               <i class="fa fa-trash-o"></i>
             </button>
         </form>
         </td>
       </tr>
       @endforeach
     </tbody>
    </table>
  </div>
</div>
@endsection
