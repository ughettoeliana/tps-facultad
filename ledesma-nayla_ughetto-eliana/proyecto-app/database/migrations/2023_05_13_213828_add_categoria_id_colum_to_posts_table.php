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
       
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedSmallInteger('categoria_id')->after('post_id');$table->foreign('categoria_id')->references('categoria_id')->on( 'categorias');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->dropColumn('categoria_id');
        });
    }
};
