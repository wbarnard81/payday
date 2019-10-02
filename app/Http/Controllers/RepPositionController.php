<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RepPosition;
use App\Http\Resources\RepPositionResource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class RepPositionController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', RepPosition::class);
        return RepPosition::all();
    }

    public function store(RepPosition $repposition)
    {
        $this->authorize('store', $repposition);

        $data = request()->validate([
            'name' => 'required|min:4',
        ]);
        RepPosition::create($data);
        return response()->json([
            'status' => '201'
        ]);
    }

    public function update(RepPosition $repposition)
    {
        $this->authorize('update', $repposition);

        $repposition = RepPosition::find(request()->id);

        $repposition->name = request()->name;

        $repposition->save();

        return (new RepPositionResource($repposition))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy($repposition)
    {
        $this->authorize('delete', RepPosition::class);

        DB::table('rep_positions')->where('id', '=', $repposition)->delete();

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
