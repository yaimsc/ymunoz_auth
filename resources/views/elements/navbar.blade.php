

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary" id="mainNavbar">
    @guest
    <a class="navbar-brand" href="{{route('login')}}">AUTH</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="navbar-nav mr-auto">
                <li id="initial" class="nav-item">
                    <a class="nav-link" href="#inicio">
                        Inicio
                    </a>
                </li>
            </ul>
    @else
    <a class="navbar-brand" href="{{route('home')}}">USER</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
              @if(Auth::user()->rol_id == 2)
              <li id="initial" class="nav-item active">
                  <a class="nav-link" href="{{route('admin.index')}}">
                      Panel Administrador
                  </a>
              </li>
              @else
                <li id="initial" class="nav-item active">
                    <a class="nav-link" href="{{route('messages.index')}}">
                        Mensajes
                    </a>
                </li>
                <li id="initial" class="nav-item active">
                    <a class="nav-link" href="{{route('messages.create')}}">
                        Nuevo mensaje
                    </a>
                </li>
                <li id="initial" class="nav-item active">
                    <a class="nav-link" href="{{route('papelera.index')}}">
                        Papelera
                    </a>
                </li>
                <li id="initial" class="nav-item active">
                    <a class="nav-link" href="{{route('premium')}}">
                        Premium
                    </a>
                </li>
                @endif
            </ul>
    @endguest


            <ul class="navbar-nav navbar-right ">
                    <!-- <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-flag"></i>
                        Idioma
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Euskara</a>
                        <a class="dropdown-item active" href="#">Castellano</a>
                      </div>
                    </li> -->
                    @guest
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('login')}}" data-target="#loginModal">
                                <i class="fa fa-sign-in"></i>
                                Login
                            </a>
                        </li>
                        <li class="nav-item active">
                            @if (Route::has('register'))
                            <a class="nav-link" href="{{route('register')}}"data-target="#registerModal">
                                <i class="fa fa-user-plus"></i>
                                Registro
                            </a>
                            @endif
                        </li>
                        @else
                        <li class="nav-item dropdown active">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('perfil')}}">{{ __('Perfil') }}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
            </ul>
        </div>
    </div>
</nav>
