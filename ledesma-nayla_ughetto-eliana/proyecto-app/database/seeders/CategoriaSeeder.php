<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('categorias')->insert([
            [
                'categoria_id' => 1,
                'nombre'    => 'Anuncio',
            ],
            [
                'categoria_id' => 2,
                'nombre'    => 'Novedades',
            ],
           
            [
                'categoria_id' => 3,
                'nombre'    => 'Entrevistas',
            ],
            [
                'categoria_id' => 4,
                'nombre'    => 'Preguntas abiertas',
            ],
            [
                'categoria_id' => 5,
                'nombre'    => 'Post participativo',
            ],
            [
                'categoria_id' => 6,
                'nombre'    => 'Reseñas',
            ],
            [
                'categoria_id' => 7,
                'nombre'    => 'Artículo',
            ],
            [
                'categoria_id' => 8,
                'nombre'    => 'Otro',
            ],
            



        ]);
    }
}
