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
        Schema::create('movies', static function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('synopsis');
            $table->integer('release_year');
            $table->integer('duration');
            $table->timestamps();
        });

        Schema::create('actors', static function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamps();
        });

        Schema::create('genders', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('movies_actors', static function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('actor_id');
            $table->foreign('actor_id')
                ->references('id')
                ->on('actors')
                ->onDelete('cascade');

            $table->unsignedBigInteger('movie_id');
            $table->foreign('movie_id')
                ->references('id')
                ->on('movies')
                ->onDelete('cascade');
        });

        Schema::create('movies_genders', static function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('gender_id');
            $table->foreign('gender_id')
                ->references('id')
                ->on('genders')
                ->onDelete('cascade');

            $table->unsignedBigInteger('movie_id');
            $table->foreign('movie_id')
                ->references('id')
                ->on('movies')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        throw new \Exception('This migration cannot be reverted');
    }
};
