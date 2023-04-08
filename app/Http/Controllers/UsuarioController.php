<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
