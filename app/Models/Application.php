<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
  use HasFactory;

  // Specify the fields that can be mass assigned
  protected $fillable = [
      'name',
      'gender',
      'address',
      'contact_number',
      'email',
      'job_position',
      'resume',
      'status',
       'image',

  ];
}
