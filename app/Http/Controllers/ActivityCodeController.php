<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityCode;
use App\Http\Resources\ActivityCodeResource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ActivityCodeController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', ActivityCode::class);
        return ActivityCode::all();
    }

    public function store(ActivityCode $actcode)
    {
        $this->authorize('store', $actcode);

        $data = request()->validate([
            'code' => 'required|min:3',
            'description' => 'required|min:4',
        ]);

        ActivityCode::create($data);
        return response()->json([
            'status' => '201'
        ]);
    }

    public function update(ActivityCode $actcode)
    {
        $this->authorize('update', $actcode);

        $data = request()->validate([
            'code' => 'required|min:3',
            'description' => 'required|min:4',
        ]);

        $actcode->update($data);

        return (new ActivityCodeResource($actcode))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy($actcode)
    {
        $this->authorize('delete', ActivityCode::class);

        DB::table('activity_codes')->where('id', '=', $actcode)->delete();

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
