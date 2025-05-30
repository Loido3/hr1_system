<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UseraccountController extends Controller
{
  public function index()
  {

    $user_account= DB::select("select  * FROM `users` where  role='admin' ");
    return view('content.pages.user-account', ['user_account' => $user_account]);
  }


  public function store(Request $request)
  {

    $existingUser = DB::table('users')->where('email', $request->email)->first();

    if ($existingUser) {
      return redirect()->back()->with('alert', 'Oops! This email already exists.');
    } else {
      User::create([
        'name' => $request->name,
        'password' => $request->password,
        'email' => $request->email,
        'status'=>'Active',
        'role'=>'admin'
      ]);
      return redirect()->back()->with('alert', 'SUCCESS REGISTER');

    }
  }


  public function destroy(Request $request)
  {
    $id=$request->user_id;
    DB::delete("DELETE FROM users WHERE id='$id'");

    return back();

  }


  public function update(Request $request)
  {

    $id=$request->userid;
    DB::table('users')->where('id',$id) ->update([
     'name' =>$request->fullname,
     'email' => $request->emailupdate, 
     'role' => $request->roleupdate, 
     'status' => $request->statusupdate, ]);
    return back();

  }




}
