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
      Schema::create('hr1_social_recognition', function (Blueprint $table) {
      $table->id('social_id');
            $table->string('employee_id')->nullable();
            $table->string('performance_review')->nullable();
            $table->string('rating')->nullable();
            $table->string('feed_back')->nullable();
            $table->string('date')->nullable();
            $table->timestamps();
  //
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
