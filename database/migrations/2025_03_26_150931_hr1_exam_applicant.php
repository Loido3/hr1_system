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
        Schema::create('hr1_exam_applicant', function (Blueprint $table) {
          $table->id('id');
          $table->string('applicant_id')->nullable();
          $table->string('examination_title')->nullable();
          $table->string('score')->nullable();
          $table->string('duration')->nullable();
          $table->string('status')->nullable();
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
