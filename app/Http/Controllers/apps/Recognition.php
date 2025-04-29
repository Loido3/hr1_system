<?php
namespace App\Http\Controllers\apps;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\social;
use App\Models\socialachievement;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;

class Recognition extends Controller
{
    public function index()
    {

      $social = DB::select("SELECT * FROM  hr1_social_recognition INNER JOIN hr1_applicant_apply on hr1_applicant_apply.applicant_id=hr1_social_recognition.employee_id INNER JOIN hr1_applicant ON hr1_applicant.applicant_id=hr1_social_recognition.employee_id");
        // Pass the recognitions to the view
      return view('content.apps.recognition',['social' => $social]);
  }

  public function store(Request $request)
  {

    $date = new DateTime('now', new DateTimeZone('Asia/Manila'));
    $Date=$date->format('Y-m-d h:i:s');
    social::create([
        'employee_id'=>$request->empid,
        'feed_back'=>$request->feedback,
        'rating'=>$request->rating,
        'performance_review'=>$request->performance,
        'date'=>$Date,
    ]);
    return redirect()->back();


}

  public function storerecog(Request $request)
  {

    $date = new DateTime('now', new DateTimeZone('Asia/Manila'));
    $Date=$date->format('Y-m-d h:i:s');
    socialachievement::create([
        'employee_id'=>$request->employeeidrec,
        'recognition_message'=>$request->messagerec,
        'achievement'=>$request->achievementrec,
        'date'=>$Date,
    ]);
    return redirect()->back();


}
}
