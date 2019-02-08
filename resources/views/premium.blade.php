@extends('layouts.mainud6')

@section('content')

<br>
<br>
<br>
<div class="container">
  <div class="titulo">
    <h1>¿Quieres ser premium?</h1>
  </div>
  <div class="contenido">
    <p><strong>Premium ofrece unas ventajas inigualables.</strong></p>
    <p>Tendrás un acceso exclusivo a todo nuestro contenido, sin esperas</p>
  </div>

  @foreach($user->rols as $rol)
      @if($rol->id != 3)
      <form action="{{ route('premium.unirse')}}" method="post">
        @csrf
        <input type="submit" name="submit" value="UNETE">
      </form>
      @else
        <p>Ya eres premium! </p>
      @endif
  @endforeach
</div>
