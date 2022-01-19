@extends('template.publicmenu')

@section('sobre')
    navActive
@endsection

@section('conteudo')
    <style>
        .zoom{
            transition: all 0.8s
        }
        .zoom:hover{
            transform: scale(1.1) rotate(10deg);
        }
    </style>


    <section>
    <div class="container-fluid mt-3" style="padding: 2% 7%;">
        <div class="row">
        <div class="m-0 p-0 col-xl-5 text-end">
            <p style="color: #444; font-size: 80px; font-weight: 800" class="mt-5"><span class="colorPatternPrimary">New</span>Fisco</p>
        </div>
        <div class="m-0 p-0 col-xl-7 text-start">
            <p style="color: #979797;line-height: 35px; margin-top: 20%; font-size: 30px; font-weight: 700">Uma nova solução para sua empresa. Plataforma web para gerenciamento de suas notas fiscais e geraçao de Sintegra.</p>
        </div>
        </div>
    </div>
    </section>

    <section>
        <div class="container-fluid mt-3" style="padding: 0 7%;">
            <p style="color: #444; margin-bottom: 3%; font-size: 20px; font-weight: 800">Desenvolvido por</p>

            <div class="row mb-5">
                <div class="col-xl-3" style="padding: 0 25px;">
                    <div class="animate__animated animate__flipInX zoom card cardPatternPurple">
                        <div class="card-body">
                            <div class="text-center">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <p style="border-bottom: 1px solid white; font-size: 22px; font-weight: 700;">Gabriel</p>
                            <p style="font-size: 14px;">Desenvolvedor Java Back-end</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3" style="padding: 0 25px;">
                    <div class="animate__animated animate__flipInX zoom card cardPatternGrey">
                        <div class="card-body">
                            <div class="text-center">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <p style="border-bottom: 1px solid white; font-size: 22px; font-weight: 700;">Guilherme</p>
                            <p style="font-size: 14px;">Desenvolvedor Web Full-Stack PHP</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3" style="padding: 0 25px;">
                    <div class="animate__animated animate__flipInX zoom card cardPatternPurple">
                        <div class="card-body">
                            <div class="text-center">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <p style="border-bottom: 1px solid white; font-size: 22px; font-weight: 700;">Lucas</p>
                            <p style="font-size: 14px;">Desenvolvedor Java Back-end</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3" style="padding: 0 25px;">
                    <div class="animate__animated animate__flipInX zoom card cardPatternGrey">
                        <div class="card-body">
                            <div class="text-center">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <p style="border-bottom: 1px solid white; font-size: 22px; font-weight: 700;">Thiago</p>
                            <p style="font-size: 14px;">Desenvolvedor Java Back-end</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection