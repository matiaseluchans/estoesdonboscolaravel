<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Asegúrate de que este use esté presente si usas el modelo
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usando Eloquent para crear un usuario
        /*User::create([
            'name' => 'Matias',
            'email' => 'matiaseluchans@gmail.com',
            'password' => Hash::make('Porloschicos22'), // Encriptamos la contraseña
        ]);

        User::create([
            'name' => 'Proyecto',
            'email' => 'proyecto11desintetico@gmail.com',
            'password' => Hash::make('Porloschicos22'), // Encriptamos la contraseña
        ]);*/
        DB::table('users')->insert([
            'name' => 'Matias',
            'email' => 'matiaseluchans@gmail.com',
            'password' => Hash::make('Porloschicos22'), // Encriptamos la contraseña
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Proyecto',
            'email' => 'proyecto11desintetico@gmail.com',
            'password' => Hash::make('Porloschicos22'), // Encriptamos la contraseña
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
