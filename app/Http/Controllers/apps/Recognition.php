<?php
namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Achievement;

class Recognition extends Controller
{
    public function index()
    {

        // Pass the recognitions to the view
        return view('content.apps.recognition');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'achievement' => 'required',
            'score' => 'required|integer',
        ]);

        // Use the Recognition model to create a new record
        Achievement::create($request->all());

        return redirect()->route('recognition.index')->with('success', 'Recognition added successfully!');
    }
}
