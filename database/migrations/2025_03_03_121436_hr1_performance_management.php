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
      Schema::create('hr1_performance_management', function (Blueprint $table) {
      $table->id('performance_id');
            $table->string('recruitment_id')->nullable();
             $table->string('employee_id')->nullable();
            $table->string('training')->nullable();
            $table->string('total_hrs')->nullable();
            $table->string('Performance_Review')->nullable();
            $table->string('Rating')->nullable();
            $table->string('Feed_back')->nullable();
            $table->string('Review_date')->nullable();
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
