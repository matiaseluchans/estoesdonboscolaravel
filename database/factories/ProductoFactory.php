<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition()
    {
        return [
            'descripcion' => $this->faker->firstName(),
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'telefono' => $this->faker->phoneNumber(),
            'data' => $this->faker->text(),
            'precio' => 30000, // Precio entre 10 y 1000
            'estado' => 'DISPONIBLE', // Estado fijo "disponible"
        ];
    }
}