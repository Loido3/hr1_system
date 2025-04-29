<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class social extends Model
{
    use HasFactory;

        protected $table="hr1_social_recognition";
    protected $fillable = [
        'social_id',
        'employee_id',
        'performance_review',
        'rating',
        'feed_back','date',
               
    ];

}
