<?php

namespace App\Http\Controllers;

use App\Models\FichaTecnica;
use Illuminate\Http\JsonResponse;

class FichaTecnicaController extends Controller
{
    public function producto(FichaTecnica $fichaTecnica): JsonResponse
    {
        $fichaTecnica->load('producto');

        return response()->json([
            'ficha_tecnica' => $fichaTecnica->only(['id', 'material', 'dimensiones', 'producto_id']),
            'producto' => $fichaTecnica->producto,
        ]);
    }
}
