<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use App\Models\SchoolTeacher;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class LoginController extends Controller
{

    public function redirect(int $user_id): RedirectResponse
    {
        $teacher = Teacher::where('user_id', $user_id)->first();
        $teacher_id = $teacher->id;
        $school_teacher = SchoolTeacher::where('teacher_id', $teacher_id)->get();
        return redirect("");
    }

    //Login Validation function
    public function authenticateTeacher(Request $request)
{
    $request->validate([
        'email' => ['required'],
        'password' => ['required'],
    ]);

    $teacher = Teacher::where('email', $request->email)->first();

    if ($teacher && Hash::check($request->password, $teacher->password)) {
        $token = $teacher->createToken('Teacher Token', ['Teacher'], now()->addDay())->plainTextToken;

        // Set the token as a cookie
        return response()->json([
            'teacher' => $teacher,
        ])->cookie(
            'auth_token', 
            $token, // The token
            60 * 24 * 7, // 1 week expiration
            null, // Path
            null, // Domain
            true, // Secure (only send via HTTPS)
            true, // HttpOnly (not accessible via JavaScript)
            false, // SameSite lax policy
            'strict'
        );
    }

    return response()->json(['error' => 'Invalid credentials'], 401);
}


    //LogOut Function
    public function logoutTeacher(Request $request)
{
    // Revoke all tokens
    $request->user()->tokens()->delete();

    // Clear the auth_token cookie
    return response()->json(['message' => 'Logged out'])->cookie('auth_token', '', -1);
}


    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required'],
            'confirm_password' => ['required'],
        ]);

        $user = User::find(Auth::user()->id);
        if (Hash::check($request['current_password'], $user->password)) {
            if ($request->new_password === $request->confirm_password) {
                $user->password = Hash::make($request->new_password);
                $user->must_change_password = false;
                $user->save();
                return redirect()->route('update-profile');
            } else {
                return back()->withErrors([
                    'new_password' => 'Passwords does not match ',
                    'confirm_password' => 'Passwords does not match ',
                ]);
            }
        } else {
            return back()->withErrors([
                'current_password' => 'Incorect Password.',
            ])->onlyInput('current_password');
        }
    }

    public function viewForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function viewForgetPasswordForm(string $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function changePasswordForm(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
