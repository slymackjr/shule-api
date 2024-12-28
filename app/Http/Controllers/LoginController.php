<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function authenticateTeacher(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        // Manually verify the credentials
        $teacher = Teacher::where('email', $request->email)->first();
    
        if ($teacher && Hash::check($request->password, $teacher->password)) {
            $token = $teacher->createToken('teacher_token', ['Teacher'])->plainTextToken;
    
            // Set the token as an HttpOnly, Secure cookie
            $cookie = cookie('auth_token', $token, 60 * 24 * 7, '/', null, true, true, false, 'lax');
    
            return response()->json([
                'teacher' => $teacher,
            ])->withCookie($cookie);
        }
    
        return response()->json(['error' => 'Invalid credentials'], 401);
    }
    
    public function teacherDetails(Request $request) {
        // Get token from cookie
        /* dd($request->cookies->all());
        $token = $request->cookie('auth_token');
    
        if (!$token) {
            return response()->json(['error' => 'Token not provided'], 401);
        }
    
        // Find the personal access token from the database
        $tokenData = PersonalAccessToken::findToken($token);
    
        // Check if the token is valid and has the correct ability
        if (!$tokenData || !$tokenData->tokenable || !$tokenData->tokenCan('Teacher')) {
            return response()->json(['error' => 'Unauthorized or invalid token'], 401);
        }
    
        // Get the authenticated teacher
        $teacher = $tokenData->tokenable;
    
        return response()->json(['data' => $teacher->makeHidden(['password'])]); */
    }
    
    // logout a user method
    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        $cookie = cookie()->forget('token');

        return response()->json([
            'message' => 'Logged out successfully!'
        ])->withCookie($cookie);
    }
}
