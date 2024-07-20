<?php

namespace App\Http\Controllers\GlobalParameter;

use App\Http\Controllers\Controller;
use App\Http\Requests\GlobalParameterTypeStoreRequest;
use App\Http\Resources\GlobalParameterResource;
use App\Http\Resources\GlobalParameterTypeResource;
use App\Models\GlobalParameterType;
use App\Traits\CreatedByAndUpdatedBy;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GlobalParameterTypeController extends Controller
{
    use HttpResponses, CreatedByAndUpdatedBy;
    public function index()
    {
        $global_parameter_type = GlobalParameterTypeResource::collection(
            GlobalParameterType::all()
        );

        return $this->success([
            'global_parameter_type' => $global_parameter_type
        ]);
    }

    public function show($id)
    {
        $global_parameter_type = GlobalParameterTypeResource::collection(
            GlobalParameterType::where('id', $id)->get()
        );

        return $this->success([
            'global_parameter_type' => $global_parameter_type
        ]);
    }

    public function store(Request $request)
    {
        
        DB::beginTransaction();

        try {

            $global_parameter_type = GlobalParameterType::create([
                'name' => $request->name,
                'description' => $request->description,
            ] + $this->created_by_and_updated_by());

            $global_parameter_type = new GlobalParameterTypeResource($global_parameter_type);

            DB::commit();
            return $this->success([
                'global_parameter_type' => $global_parameter_type,
            ]);
        } catch (\Exception $error) {

            DB::rollBack();
            return $this->error('', $error->getMessage(), 500);
        }
    }

    public function update(Request $request, $id)
    {

        DB::beginTransaction();
        try {

            $global_parameter_type = GlobalParameterType::find($id);
            $global_parameter_type->update([
                'name' => $request->name,
                'description' => $request->description,
                'is_active' => $request->is_active,
            ] + $this->updated_by());

            $global_parameter_type = new GlobalParameterTypeResource($global_parameter_type);

            DB::commit();
            return $this->success([
                'global_parameter_type' => $global_parameter_type,
            ]);
        } catch (\Exception $error) {

            DB::rollBack();
            return $this->error('', $error->getMessage(), 500);
        }
    }
}
