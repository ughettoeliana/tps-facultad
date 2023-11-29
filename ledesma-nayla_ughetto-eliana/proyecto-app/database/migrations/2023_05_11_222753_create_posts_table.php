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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(column: 'post_id');
            $table->string(column: 'titulo' , length: 150);
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id' , 'usuario_id')->references('usuario_id')->on('usuarios');
            $table->string(column:'imagen' , length:255)->nullable();
            $table->string(column:'imagen_descripcion' , length:255)->nullable();
            $table->string(column:'descripcion' , length:255);
            $table->text(column:'contenido');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
