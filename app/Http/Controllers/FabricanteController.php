<?php

namespace App\Http\Controllers;

use App\Models\Fabricante;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FabricanteController extends Controller
{
    public function create(): View
    {
        return view('fabricantes.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'pais' => 'required|string|max:100',
        ]);

        Fabricante::create($validated);

        return redirect()
            ->route('productos.create')
            ->with('success', 'Fabricante creado correctamente.');
    }

    public function productos(Fabricante $fabricante): JsonResponse
    {
        $fabricante->load('productos');

        return response()->json([
            'fabricante' => $fabricante->only(['id', 'nombre', 'pais']),
            'productos' => $fabricante->productos,
        ]);
    }
}
