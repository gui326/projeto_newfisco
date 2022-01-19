<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\SintegraController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('public.index');
})->name('index');

Route::get('/sobre', function () {
    return view('public.sobre');
})->name('sobre');

Route::get('/contato', function () {
    return view('public.contato');
})->name('contato');

Route::get('/login', function () {
    return view('public.login');
})->name('login');

Route::get('/cadastro', function(){
    return view('public.cadastro');
})->name('cadastro');

Route::post('/cadastrar', [UserController::class, 'create'])->name('cadastrar');

Route::post('/logar', [UserController::class, 'logar'])->name('logar');

Route::middleware('auth')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/', [DashController::class, 'index'])->name('dashboard');

        Route::prefix('perfil')->group(function(){
            Route::get('/', [PerfilController::class, 'index'])->name('perfil');
            Route::post('/atualizar', [PerfilController::class, 'update'])->name('atualizarPerfil');
        });

        Route::get('/notas', [NotaController::class, 'notas'])->name('notas');
        Route::post('/notas', [NotaController::class, 'notas'])->name('notas.post');

        Route::get('/testeNota', [NotaController::class, 'testeNota'])->name('teste.nota');

        Route::post('/notaVer', [NotaController::class, 'getNota'])->name('teste.ver');

        Route::post('/sintegra', [SintegraController::class, 'index'])->name('sintegra');


        Route::get('/uploads', [NotaController::class, 'index'])->name('uploads');

        Route::post('/upload', [NotaController::class, 'upload'])->name('upload');
        Route::get('/removeUpload/{id}', [NotaController::class, 'remove'])->name('removeUpload');

        Route::get('/logout', [UserController::class, 'logout'])->name('logout');

        Route::post('/notaselect', [NotaController::class, 'nota'])->name('notaFind');

        Route::prefix('usuarios')->group(function(){
            Route::get('/', [UsuarioController::class, 'index'])->name('usuarios');

            Route::get('/excluir/{id}', [UsuarioController::class, 'delete'])->name('excluirUsuario');

            Route::get('/ver/{id}', [UsuarioController::class, 'view'])->name('verUsuario');

            Route::post('/update', [UsuarioController::class, 'update'])->name('updateUsuario');
        });
        
        
        
    });
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
