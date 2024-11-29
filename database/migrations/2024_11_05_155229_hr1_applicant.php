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
        Schema::create('hr1_applicant', function (Blueprint $table) {
      $table->id('applicant_id');
            $table->string('code')->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('resume')->nullable();
            $table->string('image')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
             $table->string('job_position')->nullable();
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
