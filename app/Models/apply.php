<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apply extends Model
{
    use HasFactory;

        protected $table="hr1_applicant_apply";
    protected $fillable = [
        'recruitment_id',
        'applicant_id',
        'status',
               
    ];
}
