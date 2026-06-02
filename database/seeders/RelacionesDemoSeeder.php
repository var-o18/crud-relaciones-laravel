<?php

namespace Database\Seeders;

use App\Models\Fabricante;
use App\Models\FichaTecnica;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class RelacionesDemoSeeder extends Seeder
{
    public function run(): void
    {
        $fabricante = Fabricante::create([
            'nombre' => 'Artesanía Ibérica',
            'pais' => 'España',
        ]);

        $producto = Producto::create([
            'nombre' => 'Caja de regalo premium',
            'descripcion' => 'Caja decorativa para regalos',
            'fabricante_id' => $fabricante->id,
        ]);

        FichaTecnica::create([
            'producto_id' => $producto->id,
            'material' => 'Cartón reciclado',
            'dimensiones' => '30x20x10 cm',
        ]);

        Producto::create([
            'nombre' => 'Lazo de satén',
            'descripcion' => 'Lazo rojo para envolver regalos',
            'fabricante_id' => $fabricante->id,
        ]);
    }
}
