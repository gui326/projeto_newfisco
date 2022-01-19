<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>New Fisco - Bem Vindo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">

        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
        
        <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

        <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}" />
    </head>
    <body>

        <style>
            .arrowBack{
                background: white;
                border-color: #ca408b;
                color: #ca408b;
            }
            .arrowBack:hover,.arrowBack:focus,.arrowBack:active{
                background: #ca408b!important;
                border-color: #ca408b!important;
                color: white!important;
            }

            .btnDownload{
                background: #ca408b;
                border-color: #ca408b;
                border-radius: 50px;
                box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            }
            .btnDownload:hover,.btnDownload:focus,.btnDownload:active{
                background: white!important;
                border-color: #ca408b!important;
                color: #ca408b!important;
            }
            .textareaSintegra{
                height: 420px;
                padding: 20px;
                border-radius: 7px;
                font-size: 14px;
                box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            }
        </style>

        <div class="container">
            <div class="row mt-2">
                <div class="col-xl-12">
                    <a href="{{ route('notas') }}">
                        <button class="arrowBack btn btn-primary"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Voltar</button>
                    </a>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-xl-12 text-center">
                    <a href="{{ asset('sintegra/sintegra.txt') }}" download>
                        <button class="p-3 btnDownload btn btn-primary">Download Sintegra</button>
                    </a>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-xl-12">
                    <textarea class="form-control textareaSintegra">{{ $txt }}</textarea>
                </div>
            </div>
        </div>

        <script src="{{ asset('/js/private.js') }}"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.min.js"></script>

    </body>
</html>


