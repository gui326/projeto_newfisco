<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>New Fisco - Bem Vindo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
  
  <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

  <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}" />
</head>
<body>

<nav class="navbar navbar-expand-sm bg-light navbar-light navbarG">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('index') }}">
      <p style="font-weight: 800;position: relative;top: 8px;left: 20%;"><span class="colorPatternPrimary">New</span><span style="text-shadow: 3px 3px #80008036;">Fisco</span></p>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav" style="margin-left: auto;">
        <li class="nav-item @yield('home')">
            <a class="nav-link" href="{{ route('index'); }}">Home</a>
        </li>
        <li class="nav-item @yield('sobre')">
            <a class="nav-link" href="{{ route('sobre') }}">Sobre nós</a>
        </li>
        <li class="nav-item @yield('contato')">
            <a class="nav-link" href="{{ route('contato') }}">Contato</a>
        </li>    
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user"></i></a>
        </li>    
      </ul>
    </div>
  </div>
</nav>

@yield('conteudo')

<footer style="background: black;">
  <div class="container-fluid mt-3" style="margin-top: 0!important; padding: 4% 6%; padding-bottom: 1%!important">
    <div class="row" style="border-bottom: 1px solid white;">
      <div class="col-xl-6 text-start">
        <p class="colorPatternPrimary" style="font-weight: 800; font-size: 25px;">NEW FISCO</p>  
        <p style="font-size: 55px; font-weight: 800; color: white;">IFTM</p>
        <p style="font-size: 14px; color: white;">OFICINAS 2</p>
      </div>
      <div class="col-xl-6 text-end pt-3">
        <p style="color: white; font-size: 16px; font-weight: 800">GABRIEL</p>
        <p style="color: white; font-size: 16px; font-weight: 800">GUILHERME</p>
        <p style="color: white; font-size: 16px; font-weight: 800">LUCAS</p>
        <p style="color: white; font-size: 16px; font-weight: 800">THIAGO</p>
      </div>
    </div>

    <div class="mt-3 row">
      <div class="col-xl-6 text-start">
        <p style="color: white; font-size: 13px;">Copyright&nbsp;<i style="color: #f52395;font-size: 17px;" class="fas fa-registered"></i>&nbsp;Reserved for NewFisco Team</p>
      </div>
      <div class="col-xl-6 text-end">
        <p style="color: white; font-size: 13px;">Desenvolvido com <i style="color: #f52395;font-size: 17px;" class="fas fa-heart"></i> por NewFisco Team</p>
      </div>
    </div>
  </div>
</footer>



</body>
</html>


