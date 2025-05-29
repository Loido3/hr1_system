<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scheduling extends Model
{
    use HasFactory;


    protected $table="hr1_applicant_scheduling";
    protected $fillable = [
        'id',
        'applicant_id',
        'date',
        'time',  
        'status',  
    ];
}
