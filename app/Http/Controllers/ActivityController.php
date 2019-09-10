<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Http\Resources\ActivityResource;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Activity::class);
        return Activity::all();
    }

    public function store(Request $request)
    {
        $this->authorize('store', Activity::class);
        $activity = $request->isMethod('patch') ? Activity::findOrFail($request->activity_id) : new Activity();

        $activity->id = $request->input('activity_id');
        $activity->profit_code = $request->input('profit_code');
        $activity->loss_code = $request->input('loss_code');
        $activity->description = $request->input('activity_description');

        if ($activity->save()) {
            return new ActivityResource($activity);
        }
    }

    public function destroy($activity)
    {
        $this->authorize('delete', Activity::class);

        DB::table('activities')->where('id', '=', $activity)->delete();

        return response()->json([
            'msg' => 'Deleted'
        ]);
    }
}
