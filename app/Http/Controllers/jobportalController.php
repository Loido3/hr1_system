<?php
namespace App\Http\Controllers\authentications;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\hr2_job_qualification;
use App\Models\Recruite;
use Illuminate\Support\Facades\DB;

class jobportalController extends Controller
{
 public function index()
  {
       $Recruite= DB::table('hr2_job_qualification')
->join('hr4_recruitment', 'hr4_recruitment.recruitment_id', '=', 'hr2_job_qualification.job_request_id')->where('hr4_recruitment.status', '=','on-going')
->get();

      $pageConfigs = ['myLayout' => 'blank'];
          return view('content.jobportal.jobportal',['Recruite' => $Recruite],['pageConfigs' => $pageConfigs]);

        }



public function login(Request $request){

// dd('test post', $request->all());

  $user = User::where('email', $request->email)->first();

  // dd($user);

  if(!$user){

    // TODO:
    return back()->with('error', 'user not found');
  }



  if(!Hash::check($request->password, $user->password)){
    return back()->with('error', 'incorrect credential');
  }


if($user->role=='admin'){
  Auth::login($user);
  return redirect('/recruitment');
}else{
  Auth::login($user);
   return redirect('/');
   }
 }

}
