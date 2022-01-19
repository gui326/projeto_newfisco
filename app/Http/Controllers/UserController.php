<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    //
    public function create(request $request){
        User::create([
            'cnpj'              => str_replace(['.', '/', '-'],'',$request->cnpj),
            'razao'             => $request->razao,
            'nome'              => $request->nome,
            'email'             => $request->email,
            'inscricao'         => str_replace(['.','-','#','/'],'',$request->inscricao),
            'nomeContato'       => $request->nomeContato,
            'telefoneContato'   => str_replace(['(',')','-',' '],'',$request->telefoneContato),
            'cep'               => str_replace('-','',$request->cep),
            'rua'               => $request->rua,
            'numero'            => $request->numero,
            'complemento'       => $request->complemento,
            'bairro'            => $request->bairro,
            'cidade'            => $request->cidade,
            'estado'            => $request->estado,
            'login'             => $request->login,
            'password'          => Hash::make($request->senha),
            'permissao'         => 1,
        ]);

        $bool = Auth::attempt([
            'login'     => $request->login,
            'password'  => $request->senha,
        ]);

        if($bool){
            return redirect('admin')->with('statusPositivo', 'Conta criada com sucesso! Seja Bem-Vindo(a) a nossa plataforma :)');
        }

        return redirect('login');
    }

    public function logar(request $request){
        $bool = Auth::attempt([
            'login'     => $request->login,
            'password'  => $request->password,
        ]);

        if($bool){
            return redirect('admin');
        }

        return redirect('login');
    }

    public function logout(){
        Auth::logout();

        return redirect('login');
    }


}
