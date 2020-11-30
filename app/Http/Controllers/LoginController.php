<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //

    public function login(User $user, Request $request) {
        $error = false;
        $input = $request->input();

        Validator::make($input, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string']
        ])->validate();

        $user = User::where('email', $input['email'])->first();

        $check = $this->userCheck($user, $input);

        if(!$check) {
            return response()->json([
                'status' => true, 
                'message' => 'Login Fail: Your email or password is incorrect.',
                'hint' => 'Please check you email or password and try again!'
            ], 400);
        }

        $token = $user->createToken('login-token');
        
        return response()->json([
            'status' => true, 
            'message' => 'User logged in succesfully', 
            'user' => $user,
            'token' => $token->plainTextToken
        ]);
    }

    private function userCheck($user, $input) {
        $password = $user ? $user->password : null;
        if(!($user || Hash::check($input['password'], $password))) {
           return false;
        } return true;
    }
}
