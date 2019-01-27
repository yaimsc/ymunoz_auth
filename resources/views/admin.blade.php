@extends('layouts.mainud6')

@section('content')
  <style media="screen">
    img{
      margin-top: 10px;
      width: 120px;
      height: 120px;
      margin: 10px;
    }
    .users, .messages{
      color: #007BFF;
      font-size: 18pt;
      width: 300px;
    }
    .data{
      display: inline-flex;
      flex-direction: row;
    }
  </style>
  <br>
  <br>
  <br>
  <div class="container">
    <h1>Panel Administrador</h1>
    <div class="data">
      <div class="users">
        <img src="/img/users.png" alt="Usuarios">
        <p>{{$users->count()}} Usuarios</p>
      </div>
      <div class="messages">
        <img src="/img/email.png" alt="Mensajes">
        <p>{{$messages->count()}} Mensajes</p>
      </div>
    </div>
  </div>
@endsection
