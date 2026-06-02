<?php

namespace App\Http\Controllers;

use App\Models\Fabricante;
use App\Models\Producto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function fabricante(Producto $producto): JsonResponse
    {
        $producto->load('fabricante');

        if ($producto->fabricante === null) {
            return response()->json([
                'message' => 'Este producto no tiene fabricante asignado.',
                'producto' => $producto->only(['id', 'nombre', 'descripcion']),
            ], 404);
        }

        return response()->json([
            'producto' => $producto->only(['id', 'nombre', 'descripcion']),
            'fabricante' => $producto->fabricante,
        ]);
    }

    public function ficha(Producto $producto): JsonResponse
    {
        $producto->load('fichaTecnica');

        if ($producto->fichaTecnica === null) {
            return response()->json([
                'message' => 'Este producto no tiene ficha técnica.',
                'producto' => $producto->only(['id', 'nombre', 'descripcion']),
            ], 404);
        }

        return response()->json([
            'producto' => $producto->only(['id', 'nombre', 'descripcion']),
            'ficha_tecnica' => $producto->fichaTecnica,
        ]);
    }

    public function index()
    {
        $productos = Producto::with(['fabricante', 'fichaTecnica'])->get();

        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $fabricantes = Fabricante::orderBy('nombre')->get();

        return view('productos.create', compact('fabricantes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
            'fabricante_id' => 'nullable|exists:fabricantes,id',
        ]);

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fabricante_id' => $request->fabricante_id,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    public function edit(Producto $producto)
    {
        $fabricantes = Fabricante::orderBy('nombre')->get();

        return view('productos.edit', compact('producto', 'fabricantes'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
            'fabricante_id' => 'nullable|exists:fabricantes,id',
        ]);

        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fabricante_id' => $request->fabricante_id,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado');
    }
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado');
    }
}
