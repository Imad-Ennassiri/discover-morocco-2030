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
        Schema::create('volontaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->string('identite'); // CIN ou passeport
            $table->string('email');
            $table->string('telephone');
            $table->string('pays');
            $table->string('ville');
            $table->string('adresse')->nullable();
            $table->string('ville_volontariat');
            $table->json('langues')->nullable(); // plusieurs langues
            $table->string('niveau_etudes');
            $table->text('competences')->nullable();
            $table->string('disponibilite');
            $table->string('cv')->nullable();   // fichier cv
            $table->string('photo')->nullable(); // image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volontaires');
    }
};
