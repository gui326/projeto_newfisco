@extends('template.publicmenu')

@section('home')
    navActive
@endsection

@section('conteudo')

    <section>
        <div class="container-fluid pt-5 pb-5" style="height: 100vh; padding: 0 7%;">
            <div class="row">
                <div class="col-xl-6">
                    <p class="animate__animated animate__backInLeft" style="color: #444!important; font-size: 50px; font-weight: 800" class="mt-1"><span class="colorPatternPrimary">New</span>Fisco</p>
                    <p class="animate__animated animate__backInLeft" style="line-height: 30px; color: grey!important; font-size: 25px;font-weight: 600;width: 70%;">Uma nova solução tecnológica, para fazer o seu sistema contábil decolar.</p>

                    <img style="width: 430px;" src="{{ asset('images/imagemIndex.jpg') }}">
                </div>
                <div class="col-xl-6" style="padding: 0 4%;">
                    <div class="card animate__animated animate__backInRight cardHome">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-10">
                                    <p style="font-size: 28px; font-weight: 900">Cadastra-se agora gratuitamente :d</p>
                                </div>
                            </div>
                            

                            <div class="mt-3 row">
                                <div class="col-xl-1">
                                    <i style="font-size: 35px;" class="pt-1 fas fa-upload"></i>
                                </div>
                                <div class="col-xl-11 ps-4">
                                    <p class="mb-5 m-0" style="font-size: 19px; font-weight: 600;"> Com o plano grátis, faça até 50 uploads de notas fiscais por mês.</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-1">
                                    <i style="font-size: 35px;" class="pt-1 fas fa-hand-holding-heart"></i>
                                </div>
                                <div class="col-xl-11 ps-4">
                                    <p class="mb-5 m-0" style="font-size: 19px; font-weight: 600;"> Totalmente gratuito e com acesso ilimitado a diversas funções.</p>
                                </div>
                            </div>

                            <a href="{{ route('cadastro') }}">
                                <button type="button" class="btnCadastrar btn-block btn btn-primary">cadastrar-se</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="height: 100vh; color: white; background: linear-gradient(180deg, rgba(202, 64, 139, 0.79) 0%, #CA408B 54.17%);">
    <div class="container-fluid" style="padding: 2% 7%;">
        <div class="mt-5 mb-5 row">
        <div class="animate__animated animate__backInDown mt-5 mb-5 col-xl-4 text-center">
            <i style="font-size: 50px;" class="fas fa-rocket"></i>
            <p class="mt-2 mb-2" style="font-size: 22px; font-weight: 700">Alavanque área contábil</p>
            <p>Com o nosso sistema garantimos a redução de seu departamento contábil e agilizarmos todo o processo.</p>
        </div>
        <div class="animate__animated animate__backInDown mt-5 mb-5 col-xl-4 text-center">
            <i style="font-size: 50px;" class="fas fa-chart-pie"></i>
            <p class="mt-2 mb-2" style="font-size: 22px; font-weight: 700">Dashboard</p>
            <p>Você terá acesso a um dashboard contendo inúmeras informações.</p>
        </div>
        <div class="animate__animated animate__backInDown mt-5 mb-5 col-xl-4 text-center">
            <i style="font-size: 50px;" class="fas fa-stopwatch"></i>
            <p class="mt-2 mb-2" style="font-size: 22px; font-weight: 700">+ Tempo</p>
            <p>perca menos tempo, com o nosso sistema de uploads facilitado.</p>
        </div>
        </div>

        <div class="mt-5 mb-5 row">
        <div class="col-xl-12">
            <div class="card cardDuvida">
            <div class="card-body">
                <div class="row">
                <div class="col-xl-8">
                    <p class="colorPatternPrimary" style="font-size: 40px; font-weight: 800">Dúvidas</p>
                    <p style="color: black; font-weight: 600">entre em contato com o nosso suporte, ficaremos felizes de te responder :)</p>
                </div>
                <div class="col-xl-4 align-self-center">
                    <a href="{{ route('contato') }}">
                        <button class="btnContato btn btn-primary">Contato</button>
                    </a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

    </div>
    </section>
@endsection