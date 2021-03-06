<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name') }}</title>

  <!-- Fonts -->

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>

  <nav class="navbar navbar-expand-md bg-success navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="{{ route('inicio') }}">Nutrição Ativa</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Entrar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Registre-se</a>
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

</html>
