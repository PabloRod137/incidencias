<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Models\Aula;
use App\Models\Categoria;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    public function index()
    {
        $incidencias = Incidencia::with(['creator', 'aula', 'categoria'])->latest()->get();
        return view('back.incidencias.index', compact('incidencias'));
    }

    public function create()
    {
        $aulas = Aula::all();
        $categorias = Categoria::all();
        return view('back.incidencias.create', compact('aulas', 'categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado' => 'required|in:abierta,en_proceso,resuelta',
            'prioridad' => 'required|in:baja,media,alta,critica',
            'aula_id' => 'required|exists:aulas,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $validated['user_id'] = $request->user()->id;

        Incidencia::create($validated);

        return redirect()->route('incidencias.index')->with('success', 'Incidencia creada correctamente.');
    }

    public function show(Incidencia $incidencia)
    {
        $incidencia->load(['creator', 'aula', 'categoria', 'comentarios.user']);
        return view('back.incidencias.show', compact('incidencia'));
    }

    public function edit(Incidencia $incidencia)
    {
        $aulas = Aula::all();
        $categorias = Categoria::all();
        return view('back.incidencias.edit', compact('incidencia', 'aulas', 'categorias'));
    }

    public function update(Request $request, Incidencia $incidencia)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado' => 'required|in:abierta,en_proceso,resuelta',
            'prioridad' => 'required|in:baja,media,alta,critica',
            'aula_id' => 'required|exists:aulas,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $incidencia->update($validated);

        return redirect()->route('incidencias.index')->with('success', 'Incidencia actualizada correctamente.');
    }

    public function destroy(Incidencia $incidencia)
    {
        $incidencia->delete();
        return redirect()->route('incidencias.index')->with('success', 'Incidencia eliminada correctamente.');
    }
}
