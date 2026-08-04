<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Incidencia;
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
        $incidencias = Incidencia::all();
        return view('back.comentarios.create', compact('incidencias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'incidencia_id' => 'required|exists:incidencias,id',
            'mensaje' => 'required|string',
        ]);

        $validated['user_id'] = $request->user()->id;

        Comentario::create($validated);

        return redirect()->route('comentarios.index')->with('success', 'Comentario creado correctamente.');
    }

    public function edit(Comentario $comentario)
    {
        $this->authorizeOwner($comentario);

        $incidencias = Incidencia::all();
        return view('back.comentarios.edit', compact('comentario', 'incidencias'));
    }

    public function update(Request $request, Comentario $comentario)
    {
        $this->authorizeOwner($comentario);

        $validated = $request->validate([
            'incidencia_id' => 'required|exists:incidencias,id',
            'mensaje' => 'required|string',
        ]);

        $comentario->update($validated);

        return redirect()->route('comentarios.index')->with('success', 'Comentario actualizado correctamente.');
    }

    public function destroy(Comentario $comentario)
    {
        $this->authorizeOwner($comentario);

        $comentario->delete();
        return redirect()->route('comentarios.index')->with('success', 'Comentario eliminado correctamente.');
    }

    private function authorizeOwner(Comentario $comentario): void
    {
        $user = auth()->user();

        if ($comentario->user_id !== $user->id && $user->role !== 'admin') {
            abort(403, 'No tienes permiso para modificar este comentario.');
        }
    }
}
