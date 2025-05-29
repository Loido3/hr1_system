<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificate extends Model
{
    use HasFactory;
    protected $table="hr1_certificate";
    protected $fillable = [
        'certificate_id',
        'employee_id',
        'certificate_file',
        'message',
    ];

}
