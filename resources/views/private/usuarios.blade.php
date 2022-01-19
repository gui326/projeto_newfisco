@extends('template.privatemenu')

@section('usuarios')
    activeMenuPrivate
@endsection

@section('conteudo')
    <style>
        .Larapaginate svg{
            width: 50px;
            height: 50px;
        }
    </style>

    <h1 class="titlePrincipal">Usuários</h1>
    
    @foreach($usuarios as $user)
        <div class="mt-3 card cardPatternOne border-0" style="@if(Auth::User()->id == $user->id) background: #ca408b4a; @endif">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-1">
                        @if($user->permissao == 1)
                            <i style="font-size: 50px;" class="colorPatternPrimary fas fa-user-circle"></i>
                        @else
                            <i style="font-size: 50px;" class="colorPatternPrimary fas fa-user-tie"></i>
                        @endif
                    </div>
                    <div class="col-xl-4">
                        <p class="mb-2">{{$user->nome}}</p>
                        <p class="m-0">{{$user->cnpj}}</p>
                    </div>
                    <div class="col-xl-4 align-self-center">
                        <p class="m-0">{{$user->email}}</p>
                    </div>
                    <div class="col-xl-3 text-end">
                        <div class="row">
                            <div class="col-xl-12">
                                <a href="{{route('verUsuario', ['id' => $user->id])}}">
                                    <i class="cursor-pointer fas fa-pen"></i>
                                </a>
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-xl-12">
                                <a href="{{ route('excluirUsuario', ['id' => $user->id]) }}">
                                    <i class="cursor-pointer fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="mt-5 row">
        <div class="col-xl-12 text-center">
            <div class="Larapaginate">
                {{ $usuarios->links() }}
            </div>
        </div>
    </div>

@endsection