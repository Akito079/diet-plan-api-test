<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // public function login(Request $request){
    //     $user = User::where('email',$request->email)->first();
    //     $validators = Validator::make($request->all(),[
    //         'email' => 'required',
    //         'password' => 'required',
    //         'confirmPassword' => 'required|same:password',
    //     ]);
    //     if($validators->fails()){
    //         return response()->json([
    //             'message' => 'email or password is invalid',
    //         ]);
    //     }
    //     if(isset($user) && Hash::check($request->password,$user->password)){
    //         return response()->json([
    //             'user'=>$user,
    //             'message' => 'login success',
    //             'token' => $user->createToken('user-token')->plainTextToken,
    //         ]);
    //     }
    // }
}
