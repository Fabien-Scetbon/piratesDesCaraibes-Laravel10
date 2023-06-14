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
        Schema::create('tresors', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->longText('description');
            $table->bigInteger('prix');
            $table->float('poids');
            $table->string('etat');
            $table->foreignId('navire_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tresors');
    }
};
