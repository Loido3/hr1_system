<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recruite;

use Illuminate\Support\Facades\DB;

class Recruitment extends Controller
{
  public function index()
  {
     // Fetch all recognitions from the database


            $Recruite = DB::SELECT("select * from hr4_recruitment where  status='Occupied' || status='Approved' || status='on-going' "); 
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

      public function occupiedupdate(Request $request){
$id=$request->occupied_id;
 $Recruite_update = Recruite::where('recruitment_id',$id);
        if(!$Recruite_update){
               return abort(404);
             }
        $Recruite_update->update([
            'status' =>'Occupied',
        ]);
    return back();
    }

     public function Deleted(Request $request){
$id=$request->deleted_id;
 $Recruite_update = Recruite::where('recruitment_id',$id);
        if(!$Recruite_update){
               return abort(404);
             }
        $Recruite_update->update([
            'status' =>'Deleted',
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
