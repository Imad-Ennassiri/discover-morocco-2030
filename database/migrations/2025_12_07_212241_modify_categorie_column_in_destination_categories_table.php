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
        Schema::table('destination_categories', function (Blueprint $table) {
            // We can't easily change enum to string with Schema builder without doctrine/dbal
            // So we use raw SQL. 
            // Assuming MySQL/MariaDB
            DB::statement("ALTER TABLE destination_categories MODIFY COLUMN categorie VARCHAR(255)");
        });
    }

    public function down()
    {
        Schema::table('destination_categories', function (Blueprint $table) {
            // Revert to enum if needed, but it's risky if data doesn't match.
            // For now, we'll leave it as string or try to revert.
            // DB::statement("ALTER TABLE destination_categories MODIFY COLUMN categorie ENUM('plage', 'désert', 'montagne', 'musée', 'restaurant', 'monument historique', 'parc naturel', 'jardin')");
        });
    }
};
