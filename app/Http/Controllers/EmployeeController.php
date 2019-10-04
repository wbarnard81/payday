<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Http\Resources\EmployeeResource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Employee::class);
        return Employee::all();
    }

    public function store(Employee $request)
    {
        //$this->authorize('store', $request);

        $data = request()->validate([
            'title' => 'required',
            'first_name' => 'required',
            'nick_name' => 'required',
            'last_name' => 'required',
            'status' => 'required',
        ]);
        Employee::create($data);
        return response()->json([
            'status' => '201'
        ]);
    }

    public function update(Employee $employee)
    {
        $this->authorize('update', $employee);

        $data = request()->validate([
            'title' => 'required',
            'first_name' => 'required',
            'nick_name' => 'required',
            'last_name' => 'required',
            'status' => 'required',
        ]);

        $employee->update($data);

        return (new EmployeeResource($employee))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy(Employee $employee)
    {
        $this->authorize('delete', $employee);

        $employee->delete();

        return response()->json([
            'msg' => 'Deleted'
        ]);
    }

    public function create($country)
    { }

    public function edit($country)
    { }
}
