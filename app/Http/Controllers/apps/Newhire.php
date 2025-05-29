<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\EmployeeDocument; // If you need this, otherwise you can remove it
use App\Models\apply; // If this is the right model, otherwise use NewHireRecord
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\signup;

class Newhire extends Controller
{
  public function index()
  {
    $newEmployees = DB::select("SELECT *,hr1_applicant_apply.status as applicant_status,hr1_applicant_apply.applicant_id as appid,hr4_recruitment.department as dep FROM `hr4_recruitment` INNER  JOIN  hr1_applicant_apply on  hr1_applicant_apply.recruitment_id=hr4_recruitment.recruitment_id INNER JOIN hr1_applicant on
hr1_applicant.applicant_id=hr1_applicant_apply.applicant_id  where hr1_applicant_apply.status='Passed' 
|| hr1_applicant_apply.status='deploy'");// Fetch all new employees
    return view('content.apps.newhire', compact('newEmployees'));
  }


public function deploy(Request $request){

       $id=$request->deployed;
       $approved = apply::where('apply_id',$id);
       if(!$approved){
             return abort(404);
      }
      $approved->update(['status' =>'deploy',]);
      return back();
}


public function updatebenefit(Request $request){

       $id=$request->applicant_id;
       $approved = signup::where('applicant_id',$id);
       if(!$approved){
             return abort(404);
      }
      $approved->update(['sss' =>$request->sss,'pagibig' =>$request->pagibig,'philhealth' =>$request->philhealth,'psa' =>$request->psa,'tin' =>$request->tin,'nbi_clearance' =>$request->clearance,]);
      return back();
}





}
