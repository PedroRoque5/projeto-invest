<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pythonScript = base_path('app/Python/finance_ranking.py');
        $output = shell_exec("python $pythonScript 2>&1");
        $dados = json_decode($output, true);

        if (json_last_error() !== JSON_ERROR_NONE || !$dados) {
            $dados = [];
        }

        return view('home', compact('dados'));
    }
}
