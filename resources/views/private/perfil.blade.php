@extends('template.privatemenu')

@section('perfil')
activeMenuPrivatePerfil
@endsection

@section('conteudo')

 <div class="card-body">
        <h1 class="titlePrincipal">Perfil</h1>
        
        <form method="post" action="{{ route('atualizarPerfil') }}">
            @csrf

            <div class="mt-5 row">
                <div class="col-xl-5">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nome" id="nome" value="{{ Auth::User()->nome }}">
                        <label for="nome">Nome</label>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="cnpj" id="cnpj" value="{{ Auth::User()->cnpj }}" readonly>
                        <label for="cnpj">CNPJ</label>
                    </div>
                </div>
            </div>

            <div class="mt-3 row">
                
                <div class="col-xl-9">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="razao" id="razao" value="{{ Auth::User()->razao }}">
                        <label for="razao">Razão Social</label>
                    </div>
                </div>
            </div>

            <div class="mt-3 row">
                <div class="col-xl-5">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" value="{{ Auth::User()->email }}">
                        <label for="email">E-mail</label>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="login" id="login" value="{{ Auth::User()->login }}">
                        <label for="login">Login</label>
                    </div>
                </div>
            </div>

            <div class="mt-5 mb-0 row">
                <div class="col-xl-12 text-end">
                    <button type="submit" style="height: 40px; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; font-size: 17px; font-weight: 700; background: #CA408B; border-radius: 15px; width: 18%; border: none;" class="btn btn-primary">Atualizar</button>
                </div>
            </div>

        </form>
    </div>


    <script>
        $(document).ready(function(){
            @if(session('status'))
                Swal.fire(
                    'Perfil atualizado com sucesso!',
                    ' ',
                    'success'
                );
            @endif
        });
    </script>
@endsection