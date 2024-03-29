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
        Schema::create('gostos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produto_id')->constraned('produtos')->onDelete('cascade');
            $table->foreignId('user_id')->constraned('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gostos');
    }
};
