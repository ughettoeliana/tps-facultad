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
        Schema::create('libros', function (Blueprint $table) {
            $table->id(column:'libro_id');
            $table->string(column:'titulo', length:100);
            $table->string(column:'autor', length:100);
            $table->string(column:'editorial', length:100);
            $table->date(column:'lanzamiento');
            $table->unsignedInteger(column: 'precio');
            $table->text(column:'sinopsis');
            $table->string(column:'portada' , length:255)->nullable();
            $table->string(column:'portada_descripcion' , length:255)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
