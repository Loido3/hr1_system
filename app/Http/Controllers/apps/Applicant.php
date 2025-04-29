<?php
namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\apply;
use DateTime;
use DateTimeZone;
class Applicant extends Controller
{
   public function index()
   {

      $applicants = DB::select("SELECT *,hr1_applicant_apply.status as applicant_status FROM `hr4_recruitment` INNER  JOIN  hr1_applicant_apply on  hr1_applicant_apply.recruitment_id=hr4_recruitment.recruitment_id INNER JOIN hr1_applicant on
       hr1_applicant.applicant_id=hr1_applicant_apply.applicant_id where hr1_applicant_apply.status='Pending' ");

      // Fetch all applicants
        return view('content.apps.applicant', compact('applicants')); // Pass applicants to the view
 }

 public function reject(Request $request){
$id=$request->reject_id;
       $reject = apply::where('apply_id',$id);
       if(!$reject){
             return abort(404);
      }
      $reject->update(['status' =>'Failed',]);
      return back();


}

public function approved(Request $request){
       $date = new DateTime('now', new DateTimeZone('Asia/Manila'));
       $Date=$date->format('Y-m-d h:i:s');
       $id=$request->approved_id;
       $approved = apply::where('apply_id',$id);
       if(!$approved){
             return abort(404);
      }
      $approved->update(['status' =>'Passed','date_hired' =>$Date,]);
      return back();
}

public function hired(Request $request){

       $id=$request->hired_id;
       $hired = apply::where('apply_id',$id);
       if(!$hired){
             return abort(404);
      }
      $hired->update(['status' =>'Reject',]);
      return back();
}
}
