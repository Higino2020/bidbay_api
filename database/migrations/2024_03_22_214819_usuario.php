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
        //criar as tabelas
        Schema::create('Usuario', function (Blueprint $table){
            $table->integerIncrements('iduser');
            $table->string('nome');
            $table->string('genero');
            $table->date('data_nascimento');
            $table->string('endereco');
            $table->integer('telefone');
            $table->string('email');
            $table->string('funcao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('usuario');
    }
};
