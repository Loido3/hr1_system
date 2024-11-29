<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\signup;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class signupController extends Controller
{
     public function index()
  {




      $pageConfigs = ['myLayout' => 'blank'];
            return view('content.jobportal.signup',['pageConfigs' => $pageConfigs]);

        }

    public function store(Request $request){
        // dd($request->all());
 $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

   $random =substr(str_shuffle(str_repeat($pool, 5)), 0, 8);
        signup::create([
            'code' =>$random,
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
            'code_id' =>$random,
            'password' => $request->password,
            'email' => $request->email,
             'role'=>'customer',
        ]);
          return back();
    }

}
