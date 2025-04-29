<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserTestController extends Controller
{

    public function __construct(protected User $user)
    {
        $this->user = $user;
    }

    // This method sends a list of users through API request.
    public function sendData()
    {
        $users = $this->user->query()->get();

        return response()->json($users);
    }
}
