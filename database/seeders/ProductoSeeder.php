<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 6000 productos
        //Producto::factory()->count(6000)->create();

        for ($i=1;$i<10000 ;$i++){
            DB::table('productos')->insert([
                'descripcion' => "metro N° ".$i,
                /*'nombre' => $this->faker->firstName(),
                'apellido' => $this->faker->lastName(),
                'email' => $this->faker->unique()->safeEmail(),
                'telefono' => $this->faker->phoneNumber(),
                'data' => $this->faker->text(),*/
                'precio' => 30000, // Precio entre 10 y 1000
                'estado' => 'DISPONIBLE', // Estado fijo "disponible"
            ]);
        }
    }
}
