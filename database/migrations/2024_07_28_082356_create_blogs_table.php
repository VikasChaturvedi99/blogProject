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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Blog title
            $table->text('description'); // Blog description
            $table->string('slug')->unique(); // URL-friendly version of the title
            $table->text('excerpt')->nullable(); // Short summary of the content
            $table->string('featured_image')->nullable(); // URL of the featured image
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft'); // Status of the post
            $table->timestamp('published_at')->nullable(); // Publish date and time
            $table->unsignedBigInteger('author_id'); // Author ID
            $table->unsignedBigInteger('category_id'); // Category ID
            $table->string('meta_title')->nullable(); // Meta title
            $table->string('meta_description')->nullable(); // Meta description
            $table->string('meta_keywords')->nullable(); // Meta keywords
            $table->timestamps(); // Timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
