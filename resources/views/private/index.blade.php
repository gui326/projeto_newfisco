@extends('template.privatemenu')

@section('dashboard')
    activeMenuPrivate
@endsection

@section('conteudo')
    <style>
        .titleDash{
            color: #444; font-weight: 800; font-size: 20px
        }
        .iconDash{
            color: #ca408b;
        }
    </style>

    <h1 class="titlePrincipal">Dashboard</h1>

    @if(Auth::User()->permissao == 1)

        @csrf

        <div class="mt-4 row" style="margin-top: 8%!important;">
            <div class="col-xl-6" style="padding: 0 8%;">
                <div class="card cardDash">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-10">
                                <p class="titleDash">Notas Fiscais</p>
                            </div>
                            <div class="col-xl-2 text-end">
                                <i class="iconDash far fa-sticky-note"></i>
                            </div>
                        </div>
                        <div class="mt-4 row">
                            <div class="text-center col-xl-12">
                                <p id="qtdNota" class="animate__animated animate__zoomIn m-0 p-0" style="color: #444; font-weight: 800; font-size: 29px;">0</p>
                                <p style="font-size: 11px; font-weight: 500;">quantidade</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6" style="padding: 0 8%;">
                <div class="card cardDash">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-10">
                                <p class="titleDash">Produtos</p>
                            </div>
                            <div class="col-xl-2 text-end">
                                <i class="iconDash fas fa-boxes"></i>
                            </div>
                        </div>
                        <div class="mt-4 row">
                            <div class="text-center col-xl-12">
                                <p id="qtdProduto" class="animate__animated animate__zoomIn m-0 p-0" style="color: #444; font-weight: 800; font-size: 29px;">0</p>
                                <p style="font-size: 11px; font-weight: 500;">quantidade</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 row" style="margin-top: 12%!important;">
            <div class="col-xl-6" style="padding: 0 8%;">
                <div class="card cardDash">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-10">
                                <p class="titleDash">Total Entrada</p>
                            </div>
                            <div class="col-xl-2 text-end">
                                <i class="iconDash fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="mt-4 row">
                            <div class="text-center col-xl-12">
                                <p id="qtdEntrada" class="animate__animated animate__zoomIn m-0 p-0" style="color: #444; font-weight: 800; font-size: 29px;">0</p>
                                <p style="font-size: 12px; font-weight: 500;">reais</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6" style="padding: 0 8%;">
                <div class="card cardDash">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-10">
                                <p class="titleDash">Total Saída</p>
                            </div>
                            <div class="col-xl-2 text-end">
                                <i class="iconDash fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="mt-4 row">
                            <div class="text-center col-xl-12">
                                <p id="qtdSaida" class="animate__animated animate__zoomIn m-0 p-0" style="color: #444; font-weight: 800; font-size: 28px;">0</p>
                                <p style="font-size: 12px; font-weight: 500;">reais</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script>
        $(document).ready(function(){
            findNota();

        });
    </script>

    <script>
        function findNota(){
            var dados = new FormData();
            dados.append('mes', $('#dashboardMes').val());
            dados.append('_token', $('input[name=_token]').val());

            $.ajax({
                url: "{{ route('notaFind') }}",
                type: "post",
                data: dados,
                dataType: "json",
                contentType: false,
                processData: false,
                error: function(request, error, status){
                    console.log(request);
                    console.log(error);
                    console.log(status);
                },
                success: function(response){
                    $('#qtdNota').html(response.quantidade[0].total > 0 ? response.quantidade[0].total : 0);

                    $('#qtdProduto').html(response.produto[0].total > 0 ? response.produto[0].total : 0);
                    var entrada = parseFloat(response.entrada[0].total > 0 ? response.entrada[0].total : 0);
                    var saida = parseFloat(response.saida[0].total > 0 ? response.saida[0].total : 0);
                    $('#qtdEntrada').html(entrada.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
                    $('#qtdSaida').html(saida.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));

                }
            });
        }

    </script>
@endsection
