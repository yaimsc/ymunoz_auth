@extends('layouts.mainud6')

@section('content')
<link rel="stylesheet" href="/css/messages/vista.css">
<br>
<br>
<br>
  <div class="container">
    <div class="titulo">
      <img src="/img/mail-title.png" alt="Titulo">
      <h3>{{$message->title}}</h3>
    </div>
    <div class="from">
      <label>DE:</label>
      <div>{{$message->from}}</div>
    </div>
    <div class="to">
      <label>PARA: </label>
      <div>{{$message->to}}</div>
    </div>
    <div class="message">
      <p>{{$message->message}}</p>
    </div>
    <a href="/messages"><i class="fa fa-arrow-left fa-2x"></i></a>
  </div>
