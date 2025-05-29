<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\signup;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use DateTime;
use DateTimeZone;
class signupController extends Controller
{
     public function index()
  {
      $pageConfigs = ['myLayout' => 'blank'];
       return view('content.jobportal.signup',['pageConfigs' => $pageConfigs]);
   }

    public function store(Request $request){

    
    $existingUser = DB::table('users')->where('email', $request->email)->first();

    if ($existingUser) {
  
        // Create new user
          return redirect()->back()->with('alert', 'This email already exists. Please try another email.');

    } else {
        // Ensure `$Date` is properly defined, assuming it's the current timestamp

        // dd($request->all());
 $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

       $date = new DateTime('now', new DateTimeZone('Asia/Manila'));
       $Date=$date->format('Ymdhis');
       $random =substr(str_shuffle(str_repeat($pool, 5)), 0, 8);
        signup::create([
            'applicant_id' =>$Date,
            'firstname' => $request->first,
            'middlename' => $request->middle,
            'lastname' => $request->last,
            'address' => $request->address,
            'contact' => $request->contact,
            'email' => $request->email,
            'civil_status' => $request->civil_status,
            'age' => $request->age,
            'gender' => $request->gender,
        ]);
$gg=$request->first;
          User::create([
            'name' =>$request->first,
            'code_id' =>$Date,
            'password' => $request->password,
            'email' => $request->email,
             'role'=>'customer',
        ]);

            return redirect()->back()->with('alert', 'SUCCESS REGISTER');
    }




    }

}
