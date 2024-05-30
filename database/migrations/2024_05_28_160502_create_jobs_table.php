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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_description')->nullable();
            $table->text('description');
            $table->unsignedBigInteger('salary');
            $table->string('location');
            $table->string('languages');
            $table->enum('experience', \App\Models\Job::$experience);
            $table->foreignIdFor(\App\Models\Employer::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
