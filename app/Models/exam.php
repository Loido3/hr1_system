<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    use HasFactory;


        protected $table="hr1_exam_applicant";
    protected $fillable = [
        'id',
        'applicant_id',
        'duration',
          'examination_title',
        'status',
          'score',
               
    ];
}

