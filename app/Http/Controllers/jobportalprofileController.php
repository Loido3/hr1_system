<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use  App\Models\signup;
class jobportalprofileController extends Controller
{
     public function index()
  {

    $id=Auth::user()->code_id;

  $profiles = DB::select("select  * FROM `hr1_applicant` where  code='$id' ");


      $pageConfigs = ['myLayout' => 'blank'];
            return view('content.jobportal.jobportal-view',['profiles' =>$profiles],['pageConfigs' => $pageConfigs]);



        }

//Store image
    public function storeImage(Request $request){
  
        if($request->file('image')){
            $file= $request->file('image');
            $filename=$file->getClientOriginalName();
            $file-> move(public_path('assets\img'), $filename);
            $data['image']= $filename;
            $get=$_FILES["image"]["name"];
$id=$request->applicant_id;

$app = signup::where('applicant_id',$id);
        if(!$app){
               return abort(404);
             }
        $app->update([
            'image' =>$get,
        ]);

        }

    return back();
       
    }






}
