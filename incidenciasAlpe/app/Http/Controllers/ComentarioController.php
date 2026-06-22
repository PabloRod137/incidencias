<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Incidencia;
use App\Models\User;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index()
    {
        $comentarios = Comentario::with(['user', 'incidencia'])->latest()->get();
        return view('back.comentarios.index', compact('comentarios'));
    }

    public function create()
    {
        $usuarios = User::all();
        $incidencias = Incidencia::all();
        return view('back.comentarios.create', compact('usuarios', 'incidencias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'incidencia_id' => 'required|exists:incidencias,id',
            'user_id' => 'required|exists:users,id',
            'mensaje' => 'required|string',
        ]);

        Comentario::create($validated);

        return redirect()->route('comentarios.index')->with('success', 'Comentario creado correctamente.');
    }

    public function edit(Comentario $comentario)
    {
        $usuarios = User::all();
        $incidencias = Incidencia::all();
        return view('back.comentarios.edit', compact('comentario', 'usuarios', 'incidencias'));
    }

    public function update(Request $request, Comentario $comentario)
    {
        $validated = $request->validate([
            'incidencia_id' => 'required|exists:incidencias,id',
            'user_id' => 'required|exists:users,id',
            'mensaje' => 'required|string',
        ]);

        $comentario->update($validated);

        return redirect()->route('comentarios.index')->with('success', 'Comentario actualizado correctamente.');
    }

    public function destroy(Comentario $comentario)
    {
        $comentario->delete();
        return redirect()->route('comentarios.index')->with('success', 'Comentario eliminado correctamente.');
    }
}
