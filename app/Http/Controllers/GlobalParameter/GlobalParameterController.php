<?php

namespace App\Http\Controllers\GlobalParameter;

use App\Http\Controllers\Controller;
use App\Http\Resources\GlobalParameterResource;
use App\Models\GlobalParameter;
use App\Traits\CreatedByAndUpdatedBy;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GlobalParameterController extends Controller
{
    use HttpResponses, CreatedByAndUpdatedBy;

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $code = GlobalParameter::where('type', $request->type)->count() + 1;
            $global_parameter = GlobalParameter::create([
                'type' => $request->type,
                'name' => $request->name,
                'description' => $request->description,
                'code' => $code,
            ] +  $this->created_by_and_updated_by());

            $global_parameter = new GlobalParameterResource($global_parameter);

            DB::commit();
            return $this->success([
                'global_parameter' => $global_parameter,
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

            $global_parameter = GlobalParameter::find($id);
            $global_parameter->update([
                'name' => $request->name,
                'description' => $request->description,
                'is_active' => $request->is_active,
            ] + $this->updated_by());
            $global_parameter = new GlobalParameterResource($global_parameter);

            DB::commit();
            return $this->success([
                'global_parameter' => $global_parameter,
            ]);
        } catch (\Exception $error) {
            DB::rollBack();
            return $this->error('', $error->getMessage(), 500);
        }
    }
}
