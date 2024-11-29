<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class Register extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.register', ['pageConfigs' => $pageConfigs]);
  }
  public function register(Request $request)
  {
      // Validate the request data
      $validator = Validator::make($request->all(), [
          'username' => 'required',
          'email' => 'required',
          'password' => 'required', // Ensure you handle password confirmation
          'terms' => 'accepted', // Validate terms acceptance
      ]);

      // Check if validation fails
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }

      // Create the user and assign it to a variable
      $user = User::create([
          'username' => $request->username,
          'email' => $request->email,
          'password' => Hash::make($request->password), // Hash the password
      ]);

      // Log the user in after registration
      auth()->login($user); // Now $user is defined

      return redirect()->route('login')->with('success', 'Registration successful!');
  }
}
