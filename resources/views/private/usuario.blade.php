@extends('template.privatemenu')

@section('usuarios')
    activeMenuPrivate
@endsection

@section('conteudo')
    <h1 class="titlePrincipal">USUÁRIO #{{$usuario->id}}</h1>
    
    <form action="{{ route('updateUsuario') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $usuario->id }}">

        <div class="mt-5 row mb-4">
            <div class="col-xl-4">
                <div class="form-floating">
                    <input type="text" placeholder="Cnpj" class="cnpj form-control" name="cnpj" value="{{ $usuario->cnpj }}">
                    <label>CNPJ</label>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="form-floating">
                    <input type="text" placeholder="Razão Social" class="form-control" name="razao" value="{{ $usuario->razao }}">
                    <label>Razão Social</label>
                </div>
            </div>
            
        </div>

        <div class="row mb-4">
            <div class="col-xl-5">
                <div class="form-floating">
                    <input type="email" placeholder="E-mail" class="form-control" name="email" value="{{ $usuario->email }}">
                    <label>E-mail</label>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="form-floating">
                    <input type="text" placeholder="Nome Fantasia" class="form-control" name="nome" value="{{ $usuario->nome }}">
                    <label>Nome Fantasia</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-5">
                <div class="form-floating">
                    <input type="text" placeholder="Login" class="form-control" name="login" value="{{ $usuario->login }}">
                    <label>Login</label>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="form-floating">
                    <select name="permissao" class="form-select">
                        <option value="1" @if($usuario->permissao == 1) selected @endif>Empresa</option>
                        <option value="2" @if($usuario->permissao == 2) selected @endif>Administrador</option>
                    </select>
                    <label>Permissão</label>
                </div>
            </div>
        </div>

        <div class="mt-5 mb-0 row">
            <div class="col-xl-12 text-end">
                <button type="submit" style="height: 40px; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; font-size: 17px; font-weight: 700; background: #CA408B; border-radius: 15px; width: 18%; border: none;" class="btn btn-primary">Atualizar</button>
            </div>
        </div>
    </form>

@endsection