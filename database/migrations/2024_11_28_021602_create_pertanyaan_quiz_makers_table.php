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
        Schema::create('pertanyaan_quiz_makers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('generatesoal_id');
            $table->text('pertanyaan');
            $table->timestamps();

            $table->foreign('generatesoal_id')->references('id')->on('quizmakers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaan_quiz_makers');
    }
};
