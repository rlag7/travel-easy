<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('destination'); // Bestemming (bv. "New York")
            $table->string('airline'); // Luchtvaartmaatschappij
            $table->decimal('price', 8, 2); // Prijs
            $table->string('image'); // Afbeeldingsbestand
            $table->boolean('available')->default(true); // Beschikbaarheid
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
