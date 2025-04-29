<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\performancemodel;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;
class Performance extends Controller
{

  public function index()
  {
  
      $performance = DB::select("SELECT *,hr4_recruitment.department as  dep FROM `hr1_applicant_apply` INNER JOIN  hr1_applicant on  hr1_applicant.applicant_id=hr1_applicant_apply.applicant_id  INNER  JOIN  hr4_recruitment  on  hr4_recruitment.recruitment_id=hr1_applicant_apply.recruitment_id INNER JOIN hr1_performance_management on  hr1_performance_management.employee_id=hr1_applicant_apply.applicant_id  where  hr1_applicant_apply.status='deploy'");
    return view('content.apps.performance',compact('performance'));
  
  }


   public function store(Request $request)
    {

        $date = new DateTime('now', new DateTimeZone('Asia/Manila'));
 $Date=$date->format('Y-m-d h:i:s');
      performancemodel::create([
            'employee_id'=>$request->empid,
            'Feed_back'=>$request->feedback,
            'Rating'=>$request->rating,
            'Performance_Review'=>$request->performance,
            'total_hrs'=>$request->totalhrs,
            'date'=>$Date,
        ]);
    return redirect()->back();
    }

public function updateperformance(Request $request){
       $id=$request->performanceudpateid;
       $approved =performancemodel::where('performance_id',$id);
       if(!$approved){
        return abort(404);
      }

      $approved->update([
        'Feed_back'=>$request->feedbackupdate,
        'Rating' =>$request->updaterating,
        'total_hrs' =>$request->totalhrsupdate,
        'training' =>$request->trainingudpate,
        'Performance_Review'=>$request->performanceudpate,
        'Review_date'=>$request->datereview,
    ]);

      return back();

}




}
