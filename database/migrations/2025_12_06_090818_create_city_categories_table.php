<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('city_categories', function (Blueprint $table) {
        $table->id();
        $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
        $table->enum('categorie', [
            'touristique',
            'côtière',
            'montagneuse',
            'historique',
            'culturelle',
            'désertique'
        ]);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('city_categories');
    }
};
