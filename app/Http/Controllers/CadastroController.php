<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function create()
    {
        $posicoes = [];
        return view('cadastro.create', compact('posicoes'));
    }
}
