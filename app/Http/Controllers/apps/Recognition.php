<?php
namespace App\Http\Controllers\apps;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\social;
use App\Models\certificate;
use App\Models\socialachievement;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;

class Recognition extends Controller
{
  public function index()
  {
    $social = DB::select("SELECT *,hr4_recruitment.department as  dep FROM `hr1_applicant_apply` INNER JOIN  hr1_applicant on  hr1_applicant.applicant_id=hr1_applicant_apply.applicant_id  INNER  JOIN  hr4_recruitment  on  hr4_recruitment.recruitment_id=hr1_applicant_apply.recruitment_id INNER JOIN hr1_performance_management on  hr1_performance_management.employee_id=hr1_applicant_apply.applicant_id  where  hr1_applicant_apply.status='deploy'");
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
  public function certificate(Request $request){
    if($request->file('filecertificate')){
      $file= $request->file('filecertificate');
      $filename=$file->getClientOriginalName();
      $file-> move(public_path('assets\img'), $filename);
      $data['image']= $filename;
      $get=$_FILES["filecertificate"]["name"];
      certificate::create([
        'employee_id'=>$request->employee_id_certificate,
        'certificate_file'=>$get,
        'message'=>$request->certificate_message,
      ]);

      return back();

    }
  }


}
