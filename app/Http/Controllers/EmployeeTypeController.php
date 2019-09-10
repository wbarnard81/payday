<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeType;
use App\Http\Resources\EmployeeTypeResource;
use Illuminate\Support\Facades\DB;

class EmployeeTypeController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', EmployeeType::class);
        return EmployeeType::all();
    }

    public function store(Request $request)
    {
        $this->authorize('store', EmployeeType::class);
        $employeeType = $request->isMethod('patch') ? EmployeeType::findOrFail($request->id) : new EmployeeType();

        $employeeType->id = $request->input('empltype_id');
        $employeeType->name = $request->input('employee_type');

        if ($employeeType->save()) {
            return new EmployeeTypeResource($employeeType);
        }
    }

    public function destroy($employeeType)
    {
        $this->authorize('delete', EmployeeType::class);

        DB::table('employee_types')->where('id', '=', $employeeType)->delete();

        return response()->json([
            'msg' => 'Deleted'
        ]);
    }
}
