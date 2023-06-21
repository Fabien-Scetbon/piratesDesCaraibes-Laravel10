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
        Schema::create('navires', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->string('bois');
            $table->integer('coque')->default(10);
            $table->integer('misaine')->default(10);
            $table->integer('mat')->default(10);
            $table->integer('cachots')->default(10);
            $table->integer('cabines')->default(10);
            $table->integer('gouvernail')->default(10);
            $table->integer('voiles')->default(10);
            $table->integer('pavillon')->default(10);
            $table->integer('pont')->default(10);
            $table->integer('canons')->default(10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navires');
    }
};
