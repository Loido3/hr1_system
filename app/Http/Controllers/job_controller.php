<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hr2_job_qualification;
use Illuminate\Support\Facades\DB;
class job_controller extends Controller
{

     public function index()
  {

   $job = DB::table('hr2_job_qualification')
->join('hr4_recruitment', 'hr4_recruitment.recruitment_id', '=', 'hr2_job_qualification.job_request_id')
->get();
      
            return view('content.apps.jobqualification-view',['job' => $job]);

    
    }


    public function update(Request $request){
        // dd($request->all());
$id=$request->getid;
 $leave = hr2_job_qualification::where('job_id',$id);
        if(!$leave){
               return abort(404);
             }
        $leave->update([
            'description' => $request->editor,
            'status' => $request->status,
   
        ]);
    return back();


}

}
