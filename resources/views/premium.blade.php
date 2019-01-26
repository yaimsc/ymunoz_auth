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
  @if(Auth::user()->rol_id == 1)
  <form action="{{ route('premium.unirse')}}" method="post">
    @csrf
    <input type="submit" name="submit" value="UNETE">
  </form>
  @elseif(Auth::user()->rol_id == 3)
    <p>Ya eres premium!</p>
  @endif
</div>
