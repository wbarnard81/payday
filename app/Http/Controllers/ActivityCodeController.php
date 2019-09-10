<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityCode;
use App\Http\Resources\ActivityCodeResource;
use Illuminate\Support\Facades\DB;

class ActivityCodeController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', ActivityCode::class);
        return ActivityCode::all();
    }

    public function store(Request $request)
    {
        $this->authorize('store', ActivityCode::class);
        $activitycode = $request->isMethod('patch') ? ActivityCode::findOrFail($request->activitycode_id) : new ActivityCode();

        $activitycode->id = $request->input('activitycode_id');
        $activitycode->code = $request->input('code');
        $activitycode->description = $request->input('description');

        if ($activitycode->save()) {
            return new ActivityCodeResource($activitycode);
        }
    }

    public function destroy($activitycode)
    {
        $this->authorize('delete', ActivityCode::class);

        DB::table('activity_codes')->where('id', '=', $activitycode)->delete();

        return response()->json([
            'msg' => 'Deleted'
        ]);
    }
}
