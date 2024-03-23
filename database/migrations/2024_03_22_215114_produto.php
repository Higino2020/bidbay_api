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
        Schema::create('Produto', function (Blueprint $table){
            $table->integerIncrements('id_produto');
            $table->string('nome_produto');
            $table->unsignedInteger('id_categorias');
            $table->foreign('id_categorias')->references('id_categoria')->on('Categoria')->onDelete('cascade');
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
