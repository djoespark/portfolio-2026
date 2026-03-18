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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category'); // ex: PropTech, Luxe, E-commerce
            $table->text('description_short');
            $table->longText('description_full');
            $table->json('tech_stack'); // On stockera un tableau : ['Laravel', 'Tailwind', 'Filament']
            $table->string('github_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('order')->default(0); // Pour choisir l'ordre d'affichage
            $table->boolean('is_featured')->default(false); // Pour mettre en avant Aurelius ou Nova-Scout
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
