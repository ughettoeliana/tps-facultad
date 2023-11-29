<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(column: 'usuario_id');
            $table->string(column:'nombre' , length: 100);
            $table->string(column:'Apellido' , length: 100);
            $table->string(column:'nombre_usuario' , length: 100);
            $table->string(column:'avatar' , length:255)->nullable();
            $table->string(column: 'email' , length: 255)->unique();
            $table->string(column: 'password', length: 255);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
