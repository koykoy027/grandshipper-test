<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Mail\NewRegister;
use App\Models\User;
use App\Models\UserProfile;
use App\Traits\CreatedByAndUpdatedBy;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class RegisterController extends Controller
{

    use HttpResponses, CreatedByAndUpdatedBy;
    public function register(RegisterRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $firstname = $request->firstname;
        $is_required_to_change_password = $request->is_required_to_change_password;

        if ($is_required_to_change_password == 1) {
            $password = Str::random(12);
        }

        try {
            DB::beginTransaction();

            $user = User::create([
                'email' => $email,
                'password' => Hash::make($password),
            ]);

            UserProfile::create([
                'id' => $user->id,
                'suffix' => $request->suffix,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'gender' => $request->gender,
                'civil_status' => $request->civil_status,
                'religion' => $request->religion,
                'job_description' => $request->job_description,
                'role' => $request->role,
                'is_admin' => $request->is_admin,
                'is_required_to_change_password' => $request->is_required_to_change_password,

            ] + $this->created_by_and_updated_by());

            $user = new UserResource($user);
            Mail::to($email)->send(new NewRegister($email, $password, $firstname));
            
            DB::commit();

            return $this->success([
                'user' => $user,
            ]);
        } catch (\Exception $error) {
            DB::rollBack();
            return $this->error('', $error->getMessage(), 500);
        }
    }
}
