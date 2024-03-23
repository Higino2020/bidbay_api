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
        Schema::create('Vendedor', function (Blueprint $table){
            $table->integerIncrements('idvendedor');
            $table->unsignedInteger('id_perfil');
            $table->foreign('id_perfil')->references('idperfil')->on('Perfil')->onDelete('cascade');
            $table->unsignedInteger('id_produtos');
            $table->foreign('id_produtos')->references('id_produto')->on('Produto')->onDelete('cascade');
            $table->dateTime('Tempo');
            $table->double('preco');
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
