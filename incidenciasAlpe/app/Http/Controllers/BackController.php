<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Models\User;
use App\Models\Aula;
use App\Models\Categoria;
use App\Models\Comentario;
use Illuminate\Http\Request;

class BackController extends Controller
{
    public function index()
    {
        return view('back.index');
    }

    public function incidencias()
    {
        // Cargamos las relaciones para evitar el problema N+1
        $incidencias = Incidencia::with(['creator', 'aula', 'categoria'])->latest()->get();
        return view('back.incidencias', compact('incidencias'));
    }

    public function usuarios()
    {
        $usuarios = User::all();
        return view('back.usuarios', compact('usuarios'));
    }

    public function aulas()
    {
        $aulas = Aula::all();
        return view('back.aulas', compact('aulas'));
    }

    public function categorias()
    {
        $categorias = Categoria::with('responsable')->get();
        return view('back.categoriass', compact('categorias'));
    }

    public function comentarios()
    {
        $comentarios = Comentario::with(['user', 'incidencia'])->latest()->get();
        return view('back.comentarios', compact('comentarios'));
    }
}
