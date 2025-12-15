<?php

namespace App\Http\Controllers;

use App\Mail\toAdmin;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class authController extends Controller
{
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirmPassword' => 'required|same:password',
            'phone' => 'nullable|string',
            'country' => 'nullable|string',
            'Affiliation' => 'nullable|string',
            'level' => 'nullable|string',
            'img' => 'nullable|string',

        ]);


        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->profile()->create([
                'country' => $request->country,
                'Affiliation' => $request->Affiliation,
                'level' => $request->level,
                'phone' => $request->phone,
            ]);

            $token = $user->createToken('Token')->plainTextToken;

        }catch(\Exception $e)
        {
            $user->delete();
            return response()->json(['message' => 'Registration failed', 'error' => $e->getMessage()], 500);
        }
        // $user->sendEmailVerificationNotification();
        // Mail::to('abdallah@gmail.com')->send(new toAdmin($user));
        return response()->json(['token' => $token, 'user' => $user], 201);

    }

    function verifyEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json(['message' => 'Already verified']);
        }

        $request->user()->sendEmailVerificationNotification();

        return response()->json(['message' => 'Verification link sent']);
    }

    function Verifylink(EmailVerificationRequest $request)
    {
        $user = $request->user();

        if ($user->hasVerifiedEmail())
        {
            return response()->json(['message' => 'This link is no longer valid'], 400);
        }

        $request->fulfill();

        return response()->json(['message' => 'Email verified successfully']);
    }



    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        $user = User::where('email', $request->email)->first();


        // if (! $user->hasVerifiedEmail()) {
        //     return response()->json(['message' => 'Please verify your email before logging in.'], 403);
        // }

        // if (!$user->isActive) {
        //     return response()->json(['message' => 'Your account is not active. Please wait until actived by admin.'], 403);
        // }

        if (!$user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }



        $token = $user->createToken('Token')->plainTextToken;
        return response()->json(
            ['token' => $token, 'user' => $user],
            200
        );
    }


    public function logout(Request $request)
    {
        // Delete the current access token
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out'], 200);
    }


    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Send reset link to the user
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json(['message' => 'Password reset link sent to your email.'], 200);
        }

        return response()->json(['message' => __($status)], 400);
    }

    // Step 2: Reset password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();
                $user->tokens()->delete();
            }
        );


        return $status === Password::PASSWORD_RESET
            ? response()->json(['message' => 'Password has been reset successfully!'])
            : response()->json(['message' => __($status)], 400);
    }



    public function confirm(Request $request,$id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        if(!$request->user()->isAdmin)
        {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        if ($user->isActive) {
            return response()->json(['message' => 'User is already active'], 400);
        }

        $user->isActive = true;
        $user->save();

        return response()->json(['message' => 'User activated successfully'], 200);
    }


}
