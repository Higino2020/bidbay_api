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
        Schema::create('Carrinho', function (Blueprint $table){
            $table->integerIncrements('id_carrinho');
            $table->unsignedInteger('id_perfil');
            $table->foreign('id_perfil')->references('idperfil')->on('Perfil')->onDelete('cascade');
            $table->unsignedInteger('id_produtos');
            $table->foreign('id_produtos')->references('id_produto')->on('Produto')->onDelete('cascade');
            $table->unsignedInteger('id_vendedor');
            $table->foreign('id_vendedor')->references('idvendedor')->on('Vendedor')->onDelete('cascade');
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
