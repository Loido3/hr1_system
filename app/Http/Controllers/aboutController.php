<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutController extends Controller
{
       public function index(){
      $pageConfigs = ['myLayout' => 'blank'];
        return view('content.jobportal.about-view',['pageConfigs' => $pageConfigs]);
        }
}
