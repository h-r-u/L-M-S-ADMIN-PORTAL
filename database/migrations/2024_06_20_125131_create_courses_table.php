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
        Schema::connection('course_database')->create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cover_photo');
            $table->string('duration');
            $table->string('level');
            $table->string('price');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('course_database')->dropIfExists('courses');
    }
};
