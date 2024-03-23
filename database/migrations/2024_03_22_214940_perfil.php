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
        //
        Schema::create('Perfil', function (Blueprint $table){
            $table->integerIncrements('idperfil');
            $table->unsignedInteger('id_usuario');
            $table->foreign('id_usuario')->references('iduser')->on('Usuario')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists();
    }
};
