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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('authors');
            $table->text('abstract')->nullable();
            $table->string('keywords')->nullable();
            $table->year('paper_year');
            $table->date('paper_date');
            $table->string('journal')->nullable();
            $table->string('doi')->nullable();
            $table->string('paper_file'); // PDF path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
