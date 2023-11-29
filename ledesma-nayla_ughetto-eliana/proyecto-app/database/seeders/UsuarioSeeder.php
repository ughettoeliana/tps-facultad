<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('usuarios')->insert([

            'usuario_id' => 1,
            'email'     => 'admin@prueba.com',
            'nombre'    => 'Admin-nombre',
            'apellido'  => 'Admin-apellido',
            'nombre_usuario'    =>'Administrador',
            'avatar'        => null,
            'password'  => Hash::make('admin123'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    }
}
