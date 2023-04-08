<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Relatorio;

class UsuarioController extends Controller
{
    
    public function index()
    {
        return view('inicio');
    }

    public function cadastra()
    {
        return view('cadastra');
    }

    public function logar()
    {
        return view('login');
    }


    public function acesso()
    {

        return view('acesso');
    }

    public function store(Request $request)
    {

        $values = $request->all();

        $user = new User($values);
        $user->password = bcrypt($user->password);

        try{

            $emailUnique = User::where('email', $user->email)->first();

            if($emailUnique){
                return redirect()->route('cadastra')
                    ->with('err', "O e-email já existe no sistema");
            }

            $user->save();

        }catch(\Exception $e){

            return redirect()->route('cadastra')
                ->with("err", "O usuario não pode ser cadastrado");
        }
        

       return redirect()->route("cadastra")->with("success", "Cadastro realizado com succeso");

    }
}
