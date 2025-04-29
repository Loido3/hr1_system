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
     Schema::create('hr1_social_recognition_achievement', function (Blueprint $table) {
      $table->id('achievement_id');
            $table->string('employee_id')->nullable();
            $table->string('achievement')->nullable();
            $table->string('recognition_message')->nullable();
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
