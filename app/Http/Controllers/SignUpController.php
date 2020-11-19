<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Fortify\CreateNewUser;

class SignUpController extends Controller
{
    //

    public function  store(CreateNewUser $createNewuser, Request $request) {

        $data = $request->input();
        
        $user = $createNewuser->create($data); // Use Laravel Fortify Boiler Plate to Store User

        
        return response()->json([
            'status' => true, 
            'message' => 'User successfully created', 
            'user' => $user
            ]);
    }

    
}
