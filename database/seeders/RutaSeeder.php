<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RutaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rutas')->insert([
            'nombre' => 'Linea 11',
            'descripcion' => 'Descripcion de prueba linea 11',
            'puntos' => '57.74-11.94|57.6792-11.949'
        ]);
    }
}
