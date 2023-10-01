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
        Schema::table('genders', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');

            // Définissez la clé étrangère pour lier à la table 'users'
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('actors', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');

            // Définissez la clé étrangère pour lier à la table 'users'
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        throw new \Exception('Impossible de revenir en arrière !');
    }
};
