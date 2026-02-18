<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class APIAuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);


        if ($validated->fails()) {
            return response()->json(
                [
                    'status' => "false",
                    "message" => "Authentication Failed",
                    "errors" => $validated->errors()->all()
                ],
                422
            );
        }



        if (Auth::attempt($validated->validated())) {
            $authUser = auth()->user();
            return response()->json(
                [
                    'status' => "true"
                    ,
                    "message" => "Authentication successfully",
                    "token" => $authUser->createToken('authToken')->plainTextToken,
                    "token_type" => "Bearer"
                ],
                200
            );
        } else {
            return response()->json([
                'status' => "false",
                "message" => "Incorrect email or password",
            ], 401);
        }
    }

    public function logout(Request $request)
    {
        $user = auth()->user();
        $user ->tokens()->delete();

        return response()->json([
            'status' => "true",
            'user' => $user,
            "message" => "Logged out successfully",
        ], 200);
    }

    public function signup(Request $request)
{
   
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'profile_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'description' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors()->all()
        ], 422);
    }

    $validated = $validator->validated();

    
    if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
        $imageName = time() . '.' . $request->profile_image->extension();
        $request->profile_image->move(public_path('images'), $imageName);
    } else {
        return response()->json([
            'status' => false,
            'message' => 'Profile image failed to upload',
        ], 422);
    }

   
    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'profile_image' => $imageName,
        'description' => $validated['description'],
    ]);


    $token = $user->createToken('authToken')->plainTextToken;

    return response()->json([
        'status' => true,
        'message' => 'User stored successfully',
        'user' => $user,
        'token' => $token,
        'token_type' => 'Bearer'
    ], 201);
}

 public function getAllUsers()
    {
        return response()->json([
            "status" => "success",
            "data" => User::all()
        ], 200);
    }
}
