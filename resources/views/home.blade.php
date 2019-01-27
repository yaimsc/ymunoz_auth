@extends('layouts.mainud6')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenido {{ Auth::user()->name }}
                    @if(Auth::user()->rol_id == 3)
                      <div>
                        Ya eres premium!
                      </div>
                    @elseif(Auth::user()->rol_id == 2)
                      <div>
                        Eres Adminstrador!
                      </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
