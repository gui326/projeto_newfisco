@extends('template.publicmenu')

@section('contato')
    navActive
@endsection

@section('conteudo')
    <section id="sectionContato" style="background-image: url(images/backgroundContato.jpg)">
        <div class="container-fluid pt-3" style="padding: 0 7%;">
            <div class="row" style="padding-bottom: 10%;">
                <div class="col-xl-6">
                    <p class="mt-5 mb-0" style="color: white; font-size: 60px; font-weight: 800">Contato</p>
                    <p class="m-0" style="color: white; font-size: 25px; font-weight: 600;">Qualquer dúvida que tiver, só enviar.</p>
                </div>
                <div class="col-xl-6" style="padding: 0 4%;">
                    <div class="card cardContato">
                        <div class="card-body text-center pb-0">
                            <div class="form-floating">
                                <input type="text" placeholder="Nome Completo" class="mb-3 form-control">
                                <label style="color: #444;" for="nome">Nome Completo</label>
                            </div>  

                            <div class="form-floating">
                                <input type="text" placeholder="E-mail" class="mb-3 form-control">
                                <label style="color: #444;" for="email">E-mail</label>
                            </div>

                            <div class="form-floating">
                                <textarea style="height: 200px; " type="text" placeholder="Mensagem" class="mb-3 form-control"></textarea>
                                <label style="color: #444;" for="mensagem">Mensagem</label>
                            </div>

                            <button type="button" class="btnEnviar btn-block btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection