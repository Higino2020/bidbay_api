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
        Schema::create('Imagem', function(Blueprint $table){
            $table->integerIncrements('idImagem');
            $table->string('nome_imagem');
            $table->unsignedInteger('id_produtos');
            $table->foreign('id_produtos')->references('id_produto')->on('Produto')->ondelete('cascade');
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
