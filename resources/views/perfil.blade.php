@extends('layouts.mainud6')

@section('content')
<br>
<br>
<br>
	<form class="column" method="post" action="editView">
		@csrf
		<input id="id" type="hidden" class="form-control" name="id" value="{{ Auth::user()->id }}" required autofocus>
		<div class="form-group row">
			<label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
			<div class="col-md-6">
                <input id="text" type="text" class="form-control" name="name" value="{{ $cookie }}" required autofocus disabled>
            </div>
		</div>
		<div class="form-group row">
			<label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
			<div class="col-md-6">
                <input id="text" type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" required autofocus disabled>
            </div>
		</div>
		<div class="form-group row">
			<label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Usuario') }}</label>
			<div class="col-md-6">
				@foreach(Auth::user()->rols as $rol)
            <input id="text" type="text" class="form-control" value="{{$rol->nombre}}" required autofocus disabled>
				@endforeach
    	</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-6 col-form-label text-md-right"></div>
			<div class="col-md-6">
				<input type="submit" class="btn btn-primary" name="enviar" value="Editar">
			</div>
		</div>

	</form>
@endsection
