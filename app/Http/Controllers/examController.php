<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\exam;
use DateTime;
use DateTimeZone;
class examController extends Controller
{
             public function index()
  {    
        $exam= DB::select("select *,hr1_exam_applicant.status as  st from hr1_exam_applicant  INNER JOIN  hr1_applicant on hr1_applicant.applicant_id=hr1_exam_applicant.applicant_id ");
return view('content.apps.applicant-exam',compact('exam')); 
    }

  public function storeexam(Request $request)
    {
      exam::create([
            'applicant_id'=>$request->empid,
            'examination_title'=>$request->title,
            'score'=>$request->score,
            'duration'=>$request->duration,
            'status'=>$request->status,
        ]);
    return redirect()->back();
    }
}
