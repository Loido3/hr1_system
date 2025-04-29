<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class socialachievement extends Model
{
    use HasFactory;
     use HasFactory;
       protected $table="hr1_social_recognition_achievement";
    protected $fillable = [
        'employee_id',
        'achievement',
        'recognition_message',   
        'date', 
    ];
}
