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
        Schema::create('mcq_answers', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_correct');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('question_id')->references('id')->on('questions');
            $table->foreignId('selected_option_id')->references('id')->on('mcq_options');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mcq_answers');
    }
};
