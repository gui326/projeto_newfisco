<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <title>New Fisco - Cadastro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    
    <link href="{{  asset('css/main.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
    </head>
<body style="background-image: url({{ asset('images/backgroundLogin.jpg') }}); background-size: cover;">


<section id="sectionCadastro">
  <div class="container-fluid pt-3" style="padding: 2% 7%;">
    <a style="font-size: 28px; text-decoration: none;" href="{{ route('index') }}">
        <p style="margin-top: 1%; color: black;font-weight: 800;">
            <i class="fas fa-caret-left"></i>&nbsp;<span style="font-size: 25px; color: #444; font-weight: 700">Voltar</span>
        </p>
    </a>

    <div class="row">
        <div class="col-xl-6">
            <p style="font-size: 80px; font-weight: 800; margin-top: 20%;"><span class="colorPatternPrimary">New</span><span style="text-shadow: 3px 3px #80008036;">Fisco</span></p>
            <p style="font-size: 23px;font-weight: 600;color: #ADADAD!important;position: relative;top: -11%;left: 60%;">Acesso Restrito</p>
        </div>
        <div class="col-xl-6">
            <div class="card cardLogin">
                <div class="card-body">
                    <form method="post" action="{{ route('logar'); }}">
                        @csrf

                        <p style="color: #444; font-weight: 700; margin-bottom: 30px; font-size: 16px; text-align: center; ">Acessar conta</p>

                        <div class="form-floating">
                            <input placeholder="Login" type="text" name="login" class="form-control" placeholder="Login" required>
                            <label for="login">Login</label>
                        </div>

                        <div class="form-floating">
                            <input placeholder="senha" type="password" name="password" class="mt-4 form-control" placeholder="Senha" required>
                            <label for="password">Senha</label>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="mt-4 btnLogin btn btn-primary">Entrar</button>
                        </div>

                        <a href="{{ route('cadastro') }}">
                            <p style="text-align: end; font-weight: 700; color: #ca408b">Criar conta</p>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>



</body>
</html>


