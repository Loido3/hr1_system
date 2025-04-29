<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class performancemodel extends Model
{
    
    use HasFactory;
       protected $table="hr1_performance_management";
    protected $fillable = [
        'peformance_id',
        'employee_id',
        'training',
        'total_hrs',   
        'Performance_Review', 
        'Rating',    
        'Feed_back',
         'Review_date',    
        'Feed_back',
        
    ];
}
