<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>New Fisco - Cadastro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
  
  <link href="{{asset('css/main.css')}}" rel="stylesheet">

  <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" />
</head>
<body>

    <style>
        .form-floating>.form-control:focus~label, .form-floating>.form-control:not(:placeholder-shown)~label, .form-floating>.form-select~label{
            opacity: 1!important;
            background: white!important;
            transform: scale(.85) translateY(-0.8rem) translateX(0.6rem)!important;
            color: #ca408b!important;
            height: unset!important;
            padding: 1px 4px!important;
        }
    </style>


<section id="sectionCadastro">
  <div class="container-fluid pt-3" style="padding: 2% 7%;">
    <a style="font-size: 28px; text-decoration: none;" href="{{ route('index') }}">
        <p style="margin-top: 1%; color: black;font-weight: 800;">
            <i class="fas fa-caret-left"></i>
            <span class="colorPatternPrimary">New</span><span style="text-shadow: 3px 3px #80008036;">Fisco</span>
        </p>
    </a>

    <div class="row">
        <div class="col-xl-12">
            <div class="card cardCadastro">
                <div class="card-body">
                    <form method="post" action="{{ route('cadastrar') }}">
                        @csrf

                        <h1 style="font-weight: 700; letter-spacing: 3px;">Cadastro Empresa</h1>

                        <div class="mt-5 mb-3 row">
                            <div class="col-xl-3">
                                <div class="form-floating">
                                    <input type="text" max="14" name="cnpj" class="cnpj form-control" placeholder="CNPJ" required>
                                    <label for="cnpj">CNPJ</label>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="form-floating">
                                    <input type="text" max="14" name="inscricao" class="form-control" placeholder="Inscrição Estadual" required>
                                    <label for="cnpj">Inscrição Estadual</label>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-floating">
                                    <input type="text" name="razao" class="form-control" placeholder="Razão Social" required>
                                    <label>Razão Social</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-5 row">
                            <div class="col-xl-6">
                                <div class="form-floating">
                                    <input type="text" name="nome" class="form-control" placeholder="Nome Fantasia" required>
                                    <label>Nome Fantasia</label>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-floating">
                                    <input type="text" name="nomeContato" class="form-control" placeholder="Nome Contato" required>
                                    <label>Nome Contato</label>
                                </div>
                            </div>
                        </div>

                        <h5 class="pt-3">Contato</h5>

                        <hr>

                        <div class="mb-5 row">
                            <div class="col-xl-8">
                                <div class="form-floating">
                                    <input type="text" name="email" class="form-control" placeholder="E-mail" required>
                                    <label>E-mail</label>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-floating">
                                    <input type="text" name="telefoneContato" class="telefone form-control" placeholder="Telefone Contato" required>
                                    <label>Telefone Contato</label>
                                </div>
                            </div>
                        </div>

                        <h5 class="pt-3">Endereço</h5>

                        <hr>

                        <div class="mb-3 row">
                            <div class="col-xl-2">
                                <div class="form-floating">
                                    <input type="text" name="cep" id="cep" onfocusout="pesquisacep(this.value)" class="cep form-control" placeholder="CEP" required>
                                    <label>CEP</label>
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="form-floating">
                                    <input type="text" name="rua" id="rua" class="form-control" placeholder="Rua" required>
                                    <label>Rua</label>
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <div class="form-floating">
                                    <input type="text" name="numero" id="numero" class="form-control" placeholder="Número" required>
                                    <label>Número</label>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="form-floating">
                                    <input type="text" name="complemento" id="complemento" class="form-control" placeholder="Complemento">
                                    <label>Complemento</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5 row">
                            <div class="col-xl-4">
                                <div class="form-floating">
                                    <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro">
                                    <label>Bairro</label>
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="form-floating">
                                    <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade">
                                    <label>Cidade</label>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="form-floating">
                                    <input type="text" name="estado" id="estado" class="form-control" placeholder="Estado">
                                    <label>Estado</label>
                                </div>
                            </div>
                        </div>

                        <h5 class="pt-3">Acesso</h5>

                        <hr>

                        <div class="mb-5 row">
                            <div class="col-xl-6">
                                <div class="form-floating">
                                    <input type="text" name="login" class="form-control" placeholder="Login" required>
                                    <label>Login</label>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-floating">
                                    <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                                    <label>Senha</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5 row">
                            <div class="col-xl-12 text-end">
                                <button style="box-shadow: none!important;" type="submit" class="btnCadastro btn btn-primary">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>

<script src="{{ asset('js/main.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.min.js"></script>

</body>
</html>


