<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\UserProfile;
use App\Traits\CreatedByAndUpdatedBy;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    use HttpResponses, CreatedByAndUpdatedBy;

    public function index()
    {
        $users = UserResource::collection(
            User::all()
        );

        return $this->success([
            'users' => $users,
        ]);
    }

    public function show($id)
    {
        $user =  new UserResource(User::find($id));

        return $this->success([
            'user' => $user,
        ]);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        try {

            DB::beginTransaction();

            $user = UserProfile::find($id);
            $user->update([
                'suffix' => $request->suffix,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'gender' => $request->gender,
                'civil_status' => $request->civil_status,
                'religion' => $request->religion,
                'is_active' => $request->is_active,
                'job_description' => $request->job_description,
                'birthday' => $request->birthday,
            ] + $this->updated_by());

            $user = new UserResource($user);

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
