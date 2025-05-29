<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\scheduling;
class schedulingController extends Controller
{
   public function index()
   {
       
       $schedule=DB::SELECT("SELECT *,hr1_applicant_scheduling.status as  st,hr1_applicant_scheduling.date as  d,hr1_applicant_scheduling.time as  t,hr1_applicant_scheduling.created_at as cr,hr1_applicant_scheduling.id as schedule_id  FROM  hr1_applicant  INNER JOIN  hr1_applicant_apply  on  hr1_applicant_apply.applicant_id=hr1_applicant.applicant_id INNER JOIN hr4_recruitment on hr4_recruitment.recruitment_id=hr1_applicant_apply.recruitment_id  INNER JOIN  hr1_applicant_scheduling on hr1_applicant_scheduling.applicant_id=hr1_applicant.applicant_id");
       return view('content.apps.applicant-scheduling-view',compact('schedule'));
   }

   public function scheduling(Request $request)
   {
      scheduling::create([
        'applicant_id'=>$request->empid,
        'date'=>$request->date,
        'time'=>$request->time,
        'status'=>'Pending',
    ]);
      return redirect()->back();
  }


  public function updateschedule(Request $request){
        // dd($request->all());
    $id=$request->schedule_id;

    $leave = scheduling::where('id',$id);
    if(!$leave){
     return abort(404);
 }
 $leave->update([
   'date' => $request->dateupdate,
   'time' => $request->timeupdate,
   'status' => $request->statusupdate,
]);
 return back();
}


}
