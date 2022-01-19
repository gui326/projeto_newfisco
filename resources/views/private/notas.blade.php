@extends('template.privatemenu')

@section('nota')
    activeMenuPrivate
@endsection

@section('conteudo')

<style>
    .zoom{
        transition: all 0.3s;
    }

    .zoom:hover{
        transform: scale(1.1);
    }

    .btnSintegra{
        position: fixed;
        z-index: 10;
        right: 4%;
        bottom: 6%;
        padding: 11px 3%;
        border-radius: 25px;
        background: #ca408b;
        border-color: #ca408b;
        font-weight: 500;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .btnSintegra:hover, .btnSintegra:focus, .btnSintegra:active{
        color: #ca408b!important;
        background-color: #ffffff!important;
        border-color: #ca408b!important;
    }
</style>

    <h1 class="titlePrincipal">Notas Fiscais</h1>
    <form id="formNota" action="{{ route('notas.post') }}" method="post">
        <div class="mt-5 row">
            <div class="col-xl-4">
                @csrf

                <select onchange="document.getElementById('formNota').submit()" style="font-weight: 700; box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; border: none; letter-spacing: 2px; height: 60px; color: #CA408B; border-radius: 15px;" class="form-select" id="mes" name="mes">
                    <option value="" selected disabled> Selecione </option>
                    <option value="01" @if($mes == 1) selected @endif>Janeiro</option>
                    <option value="02" @if($mes == 2) selected @endif>Fevereiro</option>
                    <option value="03" @if($mes == 3) selected @endif>Março</option>
                    <option value="04" @if($mes == 4) selected @endif>Abril</option>
                    <option value="05" @if($mes == 5) selected @endif>Maio</option>
                    <option value="06" @if($mes == 6) selected @endif>Junho</option>
                    <option value="07" @if($mes == 7) selected @endif>Julho</option>
                    <option value="08" @if($mes == 8) selected @endif>Agosto</option>
                    <option value="09" @if($mes == 9) selected @endif>Setembro</option>
                    <option value="10" @if($mes == 10) selected @endif>Outubro</option>
                    <option value="11" @if($mes == 11) selected @endif>Novembro</option>
                    <option value="12" @if($mes == 12) selected @endif>Dezembro</option>
                </select>
            </div>
            
        </div>

    </form>


    <form method="post" action="{{ route('sintegra') }}">
        @csrf
        <input type="hidden" name="mes" value="{{ $mes }}">
        <button type="submit" class="btnSintegra btn btn-primary">Gerar Sintegra</button>
    </form>
    
    <div class="row mt-5">
        @forelse($notas as $nota)
            <div class="col-xl-3 mt-3 text-center">
                <div class="zoom card p-0 border-none" style="cursor: pointer; border: none;border-radius: 15px">
                    <div class="card-body">
                        <a href="{{ route('removeUpload', ['id' => $nota->id]) }}">
                            <i style="color: #ca408b; cursor: pointer; position: absolute;left: 64%;top: 1px;font-size: 22px;" class="fas fa-times-circle"></i>
                        </a>
                        <img data-bs-toggle="modal" data-bs-target="#notaModal" onclick="verNota({{ $nota->id }})" style="width: 170px; height: auto;" src="{{ asset('images/xml-preview.png') }}">
                        <p style="margin-top: 5px; font-size: 13px; font-weight: 700; color: black;">{{ $nota->imagem_path }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="mt-5 col-xl-12 text-center">
                <p>Nenhuma nota fiscal cadastrada.</p>
            </div>
        @endforelse
    </div>
    
    <div class="modal fade" id="notaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nota #</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-2">
                        <label class="labelMinus">Tipo</label>
                        <input type="text" class="form-control" id="tipo" readonly>
                    </div>
                    <div class="col-xl-4">
                        <label class="labelMinus">CNPJ</label>
                        <input type="text" class="cnpj form-control" id="cnpj" readonly>
                    </div>
                    <div class="col-xl-4">
                        <label class="labelMinus">Inscrição Estadual</label>
                        <input type="text" class="form-control" id="inscricao" readonly>
                    </div>
                    <div class="col-xl-2">
                        <label class="labelMinus">Estado</label>
                        <input type="text" class="form-control" id="estado" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-2">
                        <label class="labelMinus">Modelo</label>
                        <input type="text" class="form-control" id="modelo" readonly>
                    </div>
                    <div class="col-xl-2">
                        <label class="labelMinus">Série</label>
                        <input type="text" class="form-control" id="serie" readonly>
                    </div>
                    <div class="col-xl-3">
                        <label class="labelMinus">Número</label>
                        <input type="text" class="form-control" id="numero" readonly>
                    </div>
                    <div class="col-xl-2">
                        <label class="labelMinus">Quantidade</label>
                        <input type="text" class="form-control" id="qtd" readonly>
                    </div>
                    <div class="col-xl-3">
                        <label class="labelMinus">Data</label>
                        <input type="date" class="me-0 pe-0 form-control" id="data" readonly>
                    </div>
                </div>

                <div class="mt-2 row">
                    <div class="col-xl-3">
                        <label class="labelMinus">Base de Cálculo ICMS</label>
                        <input type="text" class="form-control" id="base" readonly>
                    </div>
                    <div class="col-xl-3">
                        <label class="labelMinus">ICMS</label>
                        <input type="text" class="form-control" id="icms" readonly>
                    </div>
                    <div class="col-xl-3">
                        <label class="labelMinus">Desconto</label>
                        <input type="text" class="form-control" id="desconto" readonly>
                    </div>
                    <div class="col-xl-3">
                        <label class="labelMinus">Valor Total</label>
                        <input type="text" class="form-control" id="total" readonly>
                    </div>
                </div>

                <div class="mt-2 row">
                    <div class="col-xl-12">
                        <label class="labelMinus">Produtos</label>
                        <textarea style="height: 150px;" type="text" class="form-control" id="produtos" readonly></textarea>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>


    <script>
        function verNota(id){
            var dados = new FormData();
            dados.append('id', id);
            dados.append('_token', $('input[name="_token"]').val());

            $.ajax({
                url: 'notaVer',
                type: 'post',
                data: dados,
                dataType: 'json',
                processData: false,
                contentType: false,
                error: function(error, xhr, message){
                    console.log(error);
                    console.log(xhr);
                    console.log(message);
                },
                success: function(data){
                    if(data.entrada == 0){
                        $('#tipo').val('Saída');
                    } else {
                        $('#tipo').val('Entrada');
                    }
                    
                    var entrada     = parseFloat(data.entrada);
                    var saida       = parseFloat(data.saida);
                    var desconto    = parseFloat(data.desconto);
                    var icms        = parseFloat(data.icms);

                    $('#qtd').val(data.totalQuantidade);
                    $('#cnpj').unmask().val(data.cnpj).mask('00.000.000/0000-00', {reverse: true});
                    $('#inscricao').val(data.inscricao);
                    $('#estado').val(data.estado);
                    $('#modelo').val(data.modelo);
                    $('#serie').val(data.serie);
                    $('#numero').val(data.numero);
                    $('#desconto').val(desconto.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
                    $('#base').val(data.baseIcms);
                    $('#icms').val(icms.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
                    $('#data').val(data.data);
                
                    if(entrada > 0){
                        $('#total').val(entrada.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
                    } else {
                        $('#total').val(saida.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
                    }
                    
                    var produtos = data.produtos.split('¬');
                    var quantidade = data.quantidade.split('¬');
                    var products = "qtd - nome";
                    for(var i = 0;i < produtos.length; i++){
                        if(products == ""){
                            products += "* " + quantidade[i] + " - " + produtos[i];
                        } else {
                            products += "&#13;* " + quantidade[i] + " - " + produtos[i];
                        }
                    }
                    $('#produtos').html(products);
                },

            });
        }   
    </script>
@endsection