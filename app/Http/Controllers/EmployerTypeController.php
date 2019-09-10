<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployerType;
use App\Http\Resources\EmployerTypeResource;
use Illuminate\Support\Facades\DB;

class EmployerTypeController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', EmployerType::class);
        return EmployerType::all();
    }

    public function store(Request $request)
    {
        $this->authorize('store', EmployerType::class);
        $employerType = $request->isMethod('patch') ? EmployerType::findOrFail($request->id) : new EmployerType();

        $employerType->id = $request->input('emprtype_id');
        $employerType->name = $request->input('employer_type');

        if ($employerType->save()) {
            return new EmployerTypeResource($employerType);
        }
    }

    public function destroy($employerType)
    {
        $this->authorize('delete', EmployerType::class);

        DB::table('employer_types')->where('id', '=', $employerType)->delete();

        return response()->json([
            'msg' => 'Deleted'
        ]);
    }
}
