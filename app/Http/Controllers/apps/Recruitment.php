<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recruite;

class Recruitment extends Controller
{
  public function index()
  {
     // Fetch all recognitions from the database


            $Recruite = Recruite::all(); 
    return view('content.apps.recruitment',['Recruite' => $Recruite]);
  }


  public function Recruiteupdate(Request $request){
$id=$request->recruitment_id_insert;
 $Recruite_update = Recruite::where('recruitment_id',$id);
        if(!$Recruite_update){
               return abort(404);
             }
        $Recruite_update->update([
            'status' => $request->status_insert,
        ]);
    return back();
    }


        public function Recruiteupdating(Request $request){
        // dd($request->all());
$id=$request->post_id;

 $leave = Recruite::where('recruitment_id',$id);
        if(!$leave){
               return abort(404);
             }
        $leave->update([
            'status' => $request->status,
   
        ]);
    return back();


}


}
