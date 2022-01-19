<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>New Fisco - Bem Vindo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}"> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">

  <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
  
  <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

  <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}" />
</head>
<body>

    <style>
        body{
            background: #f5f5f5;
        }
        .iconesMenu{
            margin-top: 10%;
        }

        .iconesMenu i{
            font-size: 22px;
            color: #030303;
        }

        .iconesMenu .row{
            margin-bottom: 3%;
        }

        .cardDash{
            padding: 5%; 
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; 
            border: none; 
            background: white; 
            color: white; 
            border-radius: 15px;
            color: black;
        }

        .cardDash i{
            font-size: 28px;
        }

        .iconesMenu .row:hover{
            transition: all 0.35s;
            padding-left: 10%;
        }

        .iconesMenu .row:hover p{
            color: #CA408B!important;
        }

        .iconesMenu .row:hover i{
            color: #CA408B!important;
        }

        .activeMenuPrivate{
            transition: all 5s;
            box-shadow: rgb(99 99 99 / 20%) 0px 2px 8px 0px;
            align-self: center;
            border-radius: 30px;
            width: 90%;
            margin-left: 5%;
            transition: all 0.3s;
        }

        .activeMenuPrivate i{
            font-weight: 800;
            color: #CA408B!important
        }

        .activeMenuPrivate p{
            font-weight: 800;
            color: #CA408B!important;
            padding-left: 5%!important;
        }

        .activeMenuPrivatePerfil p{
            color: #CA408B!important;
        }

        .activeMenuPrivatePerfil i{
            color: #CA408B!important;
        }

        .titlePrincipal{
            letter-spacing: 3px;
            font-weight: 800;
            font-size: 30px;
            color: #030303;
        }

        .pMenu{
            font-weight: 500;
            color: #030303;
        }

        .swal2-styled.swal2-confirm{
            background: #ca408b!important;
            color: white!important;
            width: 30%!important;
            border-radius: 9999px!important;
        }
    </style>

    <div class="loader">
        <div style="width: 100vw; height: 100vh; position: fixed; background: #ffffffd1; z-index: 1050;">
            <div class="spinner-border text-danger" style="color: #ca408b!important; position: absolute;top: 50%;left: 50%;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    <div class="row" style="width: 100%;">
        <div class="col-xl-3" style="background: white;height: 100vh;position: fixed;">
            <aside style="padding: 12%; padding-left: 11%; padding-right: 7%;">
                <a class="m-0 p-0 navbar-brand" href="{{ route('dashboard') }}">
                    <p style="position: relative; left: -19px; bottom: 24px; margin-bottom: 12%;color: black; font-weight: 800;"><span class="colorPatternPrimary">New</span><span style="text-shadow: 3px 3px #80008036;">Fisco</span></p>
                </a>

                

                <a href="{{ route('perfil') }}">
                    <div class="row @yield('perfil')">
                        <div class="col-xl-3">
                            @if(Auth::User()->permissao == 1)
                                <i style="color: #030303; font-size: 35px;position: relative;top: 4px;left: 5px;" class="fas fa-user-circle"></i>
                            @else
                                <i style="color: #030303; font-size: 35px;position: relative;top: 4px;left: 5px;" class="fas fa-user-tie"></i>
                            @endif
                        </div>
                        <div class="col-xl-9">
                            @if(Auth::User()->permissao == 1)
                                <p class="m-0 p-0" style="font-size: 12px; color: lightgray">Empresa</p>
                            @else
                                <p class="m-0 p-0" style="font-size: 12px; color: lightgray">Administrador</p>
                            @endif
                            <p class="m-0" style="color: #030303; font-size: 16px; font-weight: 600;">{{ Auth::User()->nome }}</p>
                        </div>
                    </div>
                </a>

                <hr>

                <div class="iconesMenu">
                    <a href="{{ route('dashboard') }}">
                        <div class="p-2 row @yield('dashboard')" style="cursor: pointer;">
                            <div class="col-xl-2">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <div class="col-xl-10 p-0 text-start">
                                <p class="pMenu m-0 p-0">Dashboard</p>
                            </div>
                        </div>
                    </a>

                    @if(Auth::User()->permissao == 2)
                        <a href="{{ route('usuarios') }}">
                            <div class="p-2 mt-2 row @yield('usuarios')" style="cursor: pointer;">
                                <div class="col-xl-2">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <div class="col-xl-10 p-0 text-start">
                                    <p class="pMenu m-0 p-0">Usuários</p>
                                </div>
                            </div>
                        </a>
                    @endif

                    @if(Auth::User()->permissao == 1)
                        <a href="{{ route('uploads') }}">
                            <div class="p-2 mt-2 row @yield('upload')" style="cursor: pointer;">
                                <div class="col-xl-2">
                                    <i class="fas fa-file-upload"></i>
                                </div>
                                <div class="col-xl-10 p-0 text-start">
                                    <p class="pMenu m-0 p-0">Uploads</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('notas') }}">
                            <div class="p-2 mt-2 row @yield('nota')" style="cursor: pointer;">
                                <div class="col-xl-2">
                                    <i class="far fa-sticky-note"></i>
                                </div>
                                <div class="col-xl-10 p-0 text-start">
                                    <p class="pMenu m-0 p-0">Notas Fiscais</p>
                                </div>
                            </div>
                        </a>
                    @endif

                    <a href="{{ route('logout') }}">
                        <div class="p-2 mt-2 row" style="cursor: pointer;">
                            <div class="col-xl-2">
                                <i class="fas fa-sign-out-alt"></i>
                            </div>
                            <div class="col-xl-10 p-0 text-start">
                                <p class="pMenu m-0 p-0">Sair</p>
                            </div>
                        </div>
                    </a>
                </div>
            </aside>
        </div>
        <div class="col-xl-9" style="margin-left: 25%; padding-right: 8px;">
            <div class="container-fluid mt-2" style="padding: 1% 0 1% 1%;">
                <div class="card" style="border: none; padding: 3%; box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; border-radius: 15px;">
                    <div class="card-body">
                        @yield('conteudo')
                    </div>  
                </div>
            </div>
        </div>
    </div>


<footer style="bottom: 0; left: 0; background: black; position: absolute;">
  <div class="container-fluid mt-3" style="margin-top: 0!important; padding: 4% 6%; padding-bottom: 1%!important">
    
  </div>
</footer>

<script>
    $(document).ready(function(){
        $('.loader').fadeOut().hide();

        $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
        
        @if(session('statusPositivo'))
            Swal.fire(
                '{{session('statusPositivo')}}',
                '',
                'success'
            );
        @endif

        @if(session('statusNegativo'))
            Swal.fire(
                '{{session('statusNegativo')}}',
                '',
                'error'
            );
        @endif
    });
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.min.js"></script>







</body>
</html>


