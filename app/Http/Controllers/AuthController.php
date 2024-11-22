<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        if($request->json()){
            $email = $request->json('email');
            $pwd=$request->json('password');
            $credentials = ['email'=>$email,'password'=>$pwd];
            if(!Auth::attempt($credentials)){
                return response()->json(['error'=>'The providedcredentials are incorrect. '], 401);
            }

            $user = $request->user();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'Authentified user' => [
                    'id' => $user->id,
                    'name' =>$user->name,
                ],
                'access_token' =>$token,
                'token_type' => 'bearer',
            ]);
        }
        return response()->json(['error'=>'Reqest must be JSON.'],415);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function unauthorized(){
        return response()->json(['error' =>'Unauthorized access.'], 401);
    }
}
