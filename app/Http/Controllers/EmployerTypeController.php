<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployerType;
use App\Http\Resources\EmployerTypeResource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class EmployerTypeController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', EmployerType::class);
        return EmployerType::all();
    }

    public function store(EmployerType $employerType)
    {
        $this->authorize('store', $employerType);

        $data = request()->validate([
            'name' => 'required|min:3',
        ]);
        EmployerType::create($data);
        return response()->json([
            'status' => '201'
        ]);
    }

    public function update(EmployerType $employerType)
    {
        $this->authorize('update', $employerType);

        $employerType = EmployerType::find(request()->id);

        $employerType->name = request()->name;

        $employerType->save();

        return (new EmployerTypeResource($employerType))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy($employerType)
    {
        $this->authorize('delete', EmployerType::class);

        DB::table('employer_types')->where('id', '=', $employerType)->delete();

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
