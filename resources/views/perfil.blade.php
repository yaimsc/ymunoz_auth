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
								@if(Auth::user()->rol_id == 1)
                <input id="text" type="text" class="form-control" name="email" value="normal" required autofocus disabled>
								@elseif(Auth::user()->rol_id == 3)
								<input id="text" type="text" class="form-control" name="email" value="premium" required autofocus disabled>
								@else
								<input id="text" type="text" class="form-control" name="email" value="admin" required autofocus disabled>
								@endif
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
