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
      Schema::create('hr1_certificate', function (Blueprint $table) {
      $table->id('certificate_id');
            $table->string('employee_id')->nullable();
            $table->string('certificate_file')->nullable();
            $table->string('message')->nullable();
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
