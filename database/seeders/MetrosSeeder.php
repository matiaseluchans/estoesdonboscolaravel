<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Metro;
use Illuminate\Support\Facades\DB;

class MetrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i <= 10000; $i += 2) {
            // Formatear ambos números con ceros a la izquierda
            $numero1 = str_pad($i, 4, '0', STR_PAD_LEFT);
            $numero2 = str_pad($i + 1, 4, '0', STR_PAD_LEFT);

            DB::table('metros')->insert([
                'descripcion' => "N° " . $numero1 . " y N° " . $numero2,
                'precio' => 1, // Precio entre 10 y 1000, puedes ajustarlo según sea necesario
                'estado' => 'DISPONIBLE', // Estado fijo "DISPONIBLE"
            ]);
        }
    }
}
