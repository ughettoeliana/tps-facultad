<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        DB::table('generos')->insert([
            [
                'genero_id' => 1,
                'nombre'    => 'Género narrativo',
            ],
            [
                'genero_id' => 2,
                'nombre'    => 'Género liríco',
            ],
           
            [
                'genero_id' => 3,
                'nombre'    => 'Género drámatico',
            ],
            [
                'genero_id' => 4,
                'nombre'    => 'Género didáctico',
            ],
            [
                'genero_id' => 5,
                'nombre'    => 'Novela',
            ],
            [
                'genero_id' => 6,
                'nombre'    => 'Teatral',
            ],
            [
                'genero_id' => 7,
                'nombre'    => 'Épica',
            ],
            [
                'genero_id' => 8,
                'nombre'    => 'Epopeya',
            ],
            [
                'genero_id' => 9,
                'nombre'    => 'Cuento',
            ],
            [
                'genero_id' => 10,
                'nombre'    => 'Fábula',
            ],
            [
                'genero_id' => 11,
                'nombre'    => 'Ensayo',
            ],
            [
                'genero_id' => 12,
                'nombre'    => 'Biografia',
            ],
            [
                'genero_id' => 13,
                'nombre'    => 'Crónica',
            ],
            [
                'genero_id' => 14,
                'nombre'    => 'Bestsellers',
            ],
            [
                'genero_id' => 15,
                'nombre'    => 'Literatura fantástica',
            ],
            [
                'genero_id' => 16,
                'nombre'    => 'Novela filosófica',
            ],



        ]);
        //
    }
}
