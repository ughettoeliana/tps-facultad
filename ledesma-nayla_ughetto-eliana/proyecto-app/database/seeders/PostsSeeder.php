<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        //
        DB::table('posts')->insert([
            [
                'post_id'                => 1,
                'categoria_id'           => 1,
                'titulo'                 => 'Bienvenido a EPUB Depository',
                'usuario_id'             => 1,
                'imagen'                 => null,
                'imagen_descripcion'     => null,
                'descripcion'            => 'Descubre tu próximo libro.',
                'contenido'              => 'Bienvenido/a a EPUB Depository, descubre la variedad de libros que tenemos para ofrecerte. Registrate para poder comprar, guardar tus libros favoritos y dejar una reseña.',
                'created_at'             => now(),
                'updated_at'             => now(),
            ],
            

        ]);

    }
}
