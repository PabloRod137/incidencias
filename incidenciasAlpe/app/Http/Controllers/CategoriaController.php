<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::with('responsable')->withCount('incidencias')->get();
        return view('back.categorias.index', compact('categorias'));
    }

    public function create()
    {
        $usuarios = User::whereIn('role', ['admin', 'mantenimiento'])->get();
        return view('back.categorias.create', compact('usuarios'));
    }

    public function show(Categoria $categoria)
    {
        $categoria->load('incidencias.creator', 'incidencias.aula');
        return view('back.categorias.show', compact('categoria'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'responsable_id' => 'nullable|exists:users,id',
        ]);

        Categoria::create($validated);

        return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente.');
    }

    public function edit(Categoria $categoria)
    {
        $usuarios = User::whereIn('role', ['admin', 'mantenimiento'])->get();
        return view('back.categorias.edit', compact('categoria', 'usuarios'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'responsable_id' => 'nullable|exists:users,id',
        ]);

        $categoria->update($validated);

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente.');
    }
}
