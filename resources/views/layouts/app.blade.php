<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  </head>
  <body>

    <nav class="navbar navbar-expand-md bg-success navbar-dark">
      <!-- Brand -->
      <a class="navbar-brand" href="{{ route('home') }}">Nutrição Ativa</a>

      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item"> <a href="{{ route('home') }}">Home</a> </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown" style="margin-right:70px;">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu" aria-labelledby="navbarDropdown" >

                <a class="dropdown-item" href="{{ route('cadastro', Auth::user()) }}">Meu Cadastro</a>

                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Sair
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Showcase Slider -->
    <header id="page-header">
      <div class="container">
        <div class="row">
          <div class="col-md-6 m-auto text-center">
            <h1>Início</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
          </div>
        </div>
      </div>
    </header>

    <!-- conteúdo aqui -->
    <div class="container">
      @yield('content')
    </div>
    <!-- fim conteúdo -->

    <!-- footer -->
    <hr />
    <footer id="main-footer" class="text-center p-4">
      <div class="container">
        <div class="row">
          <div class="col">
            <p>Copyright 2018 &copy; Glozzom</p>
          </div>
        </div>
      </div>
    </footer>
  </body>

  <script src="{{ asset('js/jquery.min.js') }}" charset="utf-8"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/jquery.mask.min.js') }}" charset="utf-8"></script>
  <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
  <script src="{{ asset('js/sweetalert2.all.min.js') }}" charset="utf-8"></script>

  @if(session('alerta'))
  <script type="text/javascript">
  swal({
    position: 'top-end',
    type: "{{ session('alerta')['tipo'] }}",
    title: "{{ session('alerta')['mensagem'] }}",
    showConfirmButton: false,
    timer: 1500
  })
  </script>
  @endif

  @stack('scripts')

  </html>
