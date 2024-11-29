<?php

namespace App\Http\Controllers\authentications;
use Laravel\Jetstream\Jetstream;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Login extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.login', ['pageConfigs' => $pageConfigs]);
  }
  public function login(Request $request)
  {
        // Validate the request data
        $validator = Validator::make($request->all(), [
          'email-username' => 'required',
          'password' => 'required',
      ]);

      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }

      // Attempt to log the user in
      $credentials = [
          'password' => $request->password,
      ];

      // Check if the input is an email or username
      if (filter_var($request->input('email-username'), FILTER_VALIDATE_EMAIL)) {
          $credentials['email'] = $request->input('email-username');
      } else {
          $credentials['username'] = $request->input('email-username');
      }

      // Try to authenticate
      if (Auth::attempt($credentials, $request->filled('remember-me'))) {
          // Authentication passed
          return redirect()->route('recruitment.index'); // Adjust to your desired route after login
      }

      // If authentication fails
      return redirect()->back()->withErrors(['email-username' => 'The provided credentials do not match our records.']);
  }

}
