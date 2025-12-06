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
        Schema::create('cities', function (Blueprint $table) {
              $table->id();
              $table->string('nom');
              $table->enum('size', ['big', 'small']);
             $table->text('description')->nullable();
             $table->string('label')->nullable();
             $table->string('titre');
             $table->string('image')->nullable();
             $table->string('video')->nullable();
             $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
};
