<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeType;
use App\Http\Resources\EmployeeTypeResource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class EmployeeTypeController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', EmployeeType::class);
        return EmployeeType::all();
    }

    public function store(EmployeeType $employeeType)
    {
        $this->authorize('store', $employeeType);

        $data = request()->validate([
            'name' => 'required|min:3',
        ]);
        EmployeeType::create($data);
        return response()->json([
            'status' => '201'
        ]);
    }

    public function update(EmployeeType $employeeType)
    {
        $this->authorize('update', $employeeType);

        $employeeType = EmployeeType::find(request()->id);

        $employeeType->name = request()->name;

        $employeeType->save();

        return (new EmployeeTypeResource($employeeType))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy($employeeType)
    {
        $this->authorize('delete', EmployeeType::class);

        DB::table('employee_types')->where('id', '=', $employeeType)->delete();

        return response()->json([
            'msg' => 'Deleted'
        ]);
    }

    public function create()
    {
        return null;
    }

    public function edit()
    {
        return null;
    }
}
