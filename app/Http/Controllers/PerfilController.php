<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PerfilController extends Controller
{
    //
    public function index(){
        return view('private.perfil');
    }

    public function update(request $request){
        $perfil = User::findOrFail(Auth::User()->id);
        $perfil->update([
            'nome'      => $request->nome,
            'razao'     => $request->razao,
            'email'     => $request->email,
            'login'     => $request->login,
        ]);

        return redirect('admin/perfil')->with('statusPositivo', 'Perfil atualizado com sucesso!');
    }
}
