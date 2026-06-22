<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    public function index()
    {
        $aulas = Aula::withCount('incidencias')->get();
        return view('back.aulas.index', compact('aulas'));
    }

    public function create()
    {
        return view('back.aulas.create');
    }

    public function show(Aula $aula)
    {
        $aula->load('incidencias.creator', 'incidencias.categoria');
        return view('back.aulas.show', compact('aula'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'horario' => 'nullable|string|max:255',
        ]);

        Aula::create($validated);

        return redirect()->route('aulas.index')->with('success', 'Aula creada correctamente.');
    }

    public function edit(Aula $aula)
    {
        return view('back.aulas.edit', compact('aula'));
    }

    public function update(Request $request, Aula $aula)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'horario' => 'nullable|string|max:255',
        ]);

        $aula->update($validated);

        return redirect()->route('aulas.index')->with('success', 'Aula actualizada correctamente.');
    }

    public function destroy(Aula $aula)
    {
        $aula->delete();
        return redirect()->route('aulas.index')->with('success', 'Aula eliminada correctamente.');
    }
}
