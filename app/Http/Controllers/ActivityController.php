<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Http\Resources\ActivityResource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ActivityController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Activity::class);
        return Activity::all();
    }

    public function store(Activity $activity)
    {
        $this->authorize('store', $activity);

        $data = request()->validate([
            'profit_code' => 'required|min:3',
            'loss_code' => 'required|min:3',
            'description' => 'required|min:4',
        ]);

        Activity::create($data);
        return response()->json([
            'status' => '201'
        ]);
    }

    public function update(Activity $activity)
    {
        $this->authorize('update', $activity);

        $data = request()->validate([
            'profit_code' => 'required|min:3',
            'loss_code' => 'required|min:3',
            'description' => 'required|min:4',
        ]);

        $activity->update($data);

        return (new ActivityResource($activity))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy($activity)
    {
        $this->authorize('delete', Activity::class);

        DB::table('activities')->where('id', '=', $activity)->delete();

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
