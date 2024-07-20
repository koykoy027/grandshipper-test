<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Models\UserOTP;
use App\Models\UserProfile;
use App\Traits\HttpResponses;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use HttpResponses;

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return $this->error('', 'Credentials do not match', 401);
        }

        $user = User::where('email', $request->email)->first();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $user->user_profile->firstname)->plainTextToken
        ]);
    }

    public function verify_otp(Request $request)
    {

        $user = User::where('id', $request->id)->first();
        if (!$user) {
            return $this->error('', 'User not found', 404);
        }
        $latest_otp = UserOTP::latest_otp($user);

        if ($latest_otp->otp == $request->otp) {
            if (Carbon::now()->gt(Carbon::parse($latest_otp->expired_at))) {
                return $this->error('', 'OTP code is expired', 400);
            }

            return $this->success([
                'user' => $user,
                'token' => $user->createToken('API Token of ' . $user->user_profile->firstname)->plainTextToken
            ]);

        } else {
            return $this->error('', 'Wrong OTP', 400);
        }
    }
}
