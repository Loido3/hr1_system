<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\EmployeeDocument; // If you need this, otherwise you can remove it
use App\Models\apply; // If this is the right model, otherwise use NewHireRecord
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Newhire extends Controller
{
  public function index()
  {
    $newEmployees = DB::select("SELECT *,hr1_applicant_apply.status as applicant_status FROM `hr4_recruitment` INNER  JOIN  hr1_applicant_apply on  hr1_applicant_apply.recruitment_id=hr4_recruitment.recruitment_id INNER JOIN hr1_applicant on
hr1_applicant.code=hr1_applicant_apply.applicant_id  where hr1_applicant_apply.status='Hired'");// Fetch all new employees
    return view('content.apps.newhire', compact('newEmployees'));
  }


}
