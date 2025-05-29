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
            Schema::create('hr1_applicant_scheduling', function (Blueprint $table) {
          $table->id('id');
          $table->string('applicant_id')->nullable();
          $table->string('date')->nullable();
          $table->string('time')->nullable();
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
