<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Suport\Facades\DB;
use Illuminate\Suport\Facades\Hash;
use Illuminate\Suport\Facades\Validator;

class CadastroController extends Controller
{
    public function index(){
        
        return view("wlcome");
    }

    public function salvar(Request $request){

        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:100',
            'email' => 'required|email|max:150|unique:usuarios,email',
            'senha' => 'required|min:6'
        ]);

          // se der erro, volta com mensagens
          if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // insere no banco
        DB::table('usuarios')->insert([
            'nome'         => $request->nome,
            'email'        => $request->email,
            'senha_hash'   => Hash::make($request->senha),
            'status'       => true,
            'data_cadastro' => now()
        ]);

        // mensagem de sucesso
        return redirect()->back()->with('sucesso', 'Usuário cadastrado com sucesso!');
    
    }
}
