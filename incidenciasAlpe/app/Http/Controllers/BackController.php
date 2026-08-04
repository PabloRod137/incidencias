<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Categoria;
use App\Models\Comentario;
use App\Models\Incidencia;
use App\Models\User;

class BackController extends Controller
{
    public function index()
    {
        $stats = [
            'incidencias' => Incidencia::count(),
            'usuarios' => User::count(),
            'aulas' => Aula::count(),
            'categorias' => Categoria::count(),
        ];

        $incidenciasRecientes = Incidencia::latest()->take(5)->get();
        $comentariosRecientes = Comentario::with('user')->latest()->take(5)->get();

        return view('back.index', compact('stats', 'incidenciasRecientes', 'comentariosRecientes'));
    }
}
