<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HorarioPermitido
{

    public function handle(Request $request, Closure $next)
    {
        $horaActual = now()->format('H');

       
        if ($horaActual < 8 || $horaActual >= 20) {
            return response()->view('errores.horario', [], 403);
        }

        return $next($request);
    }
}
