@extends('template.privatemenu')

@section('upload')
    activeMenuPrivate
@endsection

@section('conteudo')
    <style>
        .dropzone{
            padding-bottom: 35%;
            border-radius: 10px!important;
            border: 2px dashed rgb(202 64 139);
        }
        .dz-message{
            font-size: 14px;
            font-weight: 500;
            font-family: 'Inter';
            color: #a7a7a7;
            position: relative;
            top: 140px;
        }
    </style>

    <h1 class="titlePrincipal">Upload</h1>

    <form action="{{ route('upload'); }}" class="mt-5 dropzone" id="my_awesome_dropzone" encytpe="multipart/form-data">
        @csrf
        <div class="dz-message" data-dz-message><span>Arraste os arquivos aqui para upload</span></div>
    </form>

    <script>
        Dropzone.options.my_awesome_dropzone = {
            autoProcessQueue:false,
            required:true,
            acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg,.xml",
            addRemoveLinks: true,
            maxFiles:8,
            parallelUploads : 100,
            maxFilesize:5,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        };
    </script>

@endsection