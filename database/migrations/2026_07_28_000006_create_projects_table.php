<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_type_id')->constrained()->cascadeOnDelete();

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_description')->nullable();

            $table->text('problem')->nullable();
            $table->text('solution')->nullable();
            $table->json('features')->nullable();
            $table->text('results')->nullable();
            $table->text('challenges')->nullable();
            $table->text('lessons_learned')->nullable();

            // Opcionales a propósito: un proyecto puede publicarse sin
            // repositorio ni demo, y completarse más adelante.
            $table->string('repo_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('video_url')->nullable();

            $table->boolean('featured')->default(false);
            $table->string('status')->default('draft'); // draft | published
            $table->timestamp('published_at')->nullable();
            $table->unsignedInteger('order')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'published_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
