<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\signup as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class signup extends Model
{


  use HasApiTokens, HasFactory, Notifiable;

  protected $table="hr1_applicant";

  protected $fillable=[
    'applicant_id',
    'firstname',
    'lastname',
    'middlename',
    'civil_status',
    'address',
    'email',
    'contact',
    'age',
    'resume',
    'image',
    'status',
       'code',
        'gender',
       'job_position',

];


protected $casts = [
    'password' => 'hashed',
];

protected $hidden = [
    'password',
    'remember_token',
];
}
