<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apply;
class applyController extends Controller
{

         public function stored(Request $request){
          apply::create([
            'recruitment_id' =>$request->recruitment_id,
            'applicant_id' =>$request->applicant_id,
            'status' => 'Pending',
        ]);
    return redirect()->back();
  }

  
 }
