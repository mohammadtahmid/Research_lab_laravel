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
        Schema::create('teacher_details', function (Blueprint $table) {
            $table->id();

            // Education
            $table->string('edu_year')->nullable();
            $table->string('edu_degree')->nullable();
            $table->string('edu_university')->nullable();
            $table->string('edu_location')->nullable();

            // Professional Appointments
            $table->string('pro_start')->nullable();
            $table->string('pro_end')->nullable();
            $table->string('pro_designation')->nullable();
            $table->string('pro_organization')->nullable();
            $table->string('pro_location')->nullable();

            // Awards & Prizes
            $table->string('award_year')->nullable();
            $table->string('award_org')->nullable();
            $table->string('award_location')->nullable();
            $table->string('award_responsibility')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_details');
    }
};
