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
    Schema::create('destinations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
        $table->string('nom');
        $table->text('description')->nullable();
        $table->string('label')->nullable();
        $table->string('titre');
        $table->string('image')->nullable();
        $table->string('video')->nullable();
        $table->string('gps_location')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('destinations');
    }
};
