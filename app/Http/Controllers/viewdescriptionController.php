<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\apply;
class viewdescriptionController extends Controller
{

       public function index(){
      $pageConfigs = ['myLayout' => 'blank'];
        return view('content.jobportal.view-description',['pageConfigs' => $pageConfigs]);
        }


        public function getmoto(Request $request)
  {

$id =$request->getid;
$job = DB::table('hr2_job_qualification')
->join('hr4_recruitment', 'hr4_recruitment.recruitment_id', '=', 'hr2_job_qualification.job_request_id')
->where('hr2_job_qualification.job_request_id',$id)
->get();

        if(!$job){
               return abort(404);
             }

      $pageConfigs = ['myLayout' => 'blank'];
        return view('content.jobportal.view-description',['pageConfigs' => $pageConfigs],['job' => $job]);

        }


       public function stored(Request $request){
          apply::create([
            'recruitment_id' =>$request->recruitment_id,
            'applicant_id' =>$request->applicant_id,
            'status' => 'Pending',
        ]);


$id =$request->recruitment_id;
$job = DB::table('hr2_job_qualification')
->join('hr4_recruitment', 'hr4_recruitment.recruitment_id', '=', 'hr2_job_qualification.job_request_id')
->where('hr2_job_qualification.job_request_id',$id)
->get();
    if(!$job){
               return abort(404);
             }

      $pageConfigs = ['myLayout' => 'blank'];
        return view('content.jobportal.view-description',['pageConfigs' => $pageConfigs],['job' => $job]);
  }
}
