@extends('layouts.mainud6')

@section('content')
<br>
<br>
<br>
<div class="container">
  <form class="" action="{{route('messages.store')}}" method="post">
    @csrf
    <div class="form-group row">
			<label for="de" class="col-sm-4 col-form-label text-md-right">{{ __('De') }}</label>
			<div class="col-md-6">
        <input name="from" type="text" class="form-control" value="{{ Auth::user()->email }}" required autofocus disabled>
      </div>
		</div>
    <div class="form-group row">
			<label for="para" class="col-sm-4 col-form-label text-md-right">{{ __('Para') }}</label>
			<div class="col-md-6">
        <input name="to" type="email" class="form-control" value="" required autofocus>
      </div>
		</div>
    <div class="form-group row">
			<label for="para" class="col-sm-4 col-form-label text-md-right">{{ __('Titulo') }}</label>
			<div class="col-md-6">
        <input name="title" type="text" class="form-control" value="" required autofocus>
      </div>
		</div>
    <div class="form-group row">
			<label for="message" class="col-sm-4 col-form-label text-md-right">{{ __('Mensaje') }}</label>
			<div class="col-md-6">
        <textarea name="message" class="form-control" rows="8"></textarea>
      </div>
		</div>
    <div class="form-group row">
			<label for="message" class="col-sm-4 col-form-label text-md-right">{{ __('Añadir Archivo') }}</label>
			<div class="col-md-6">
        <input type="file" name="file" value="">
      </div>
		</div>
    <div class="form-group row">
			<div class="col-sm-4 col-form-label text-md-right"></div>
			<div class="col-md-6">
				<input type="submit" class="btn btn-primary" name="enviar" value="Enviar">
			</div>
		</div>
  </form>
</div>

@endsection
