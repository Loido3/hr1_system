<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hr2_job_qualification extends Model
{
    use HasFactory;



         protected $table="hr2_job_qualification";
      protected $fillable = [
        'job_id',
        'job_request_id',
        'description',
        'status',        
    ];

}
