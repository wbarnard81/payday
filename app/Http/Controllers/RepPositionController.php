<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RepPosition;
use App\Http\Resources\RepPositionResource;
use Illuminate\Support\Facades\DB;

class RepPositionController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', RepPosition::class);
        return RepPosition::all();
    }

    public function store(Request $request)
    {
        $this->authorize('store', RepPosition::class);
        $repposition = $request->isMethod('patch') ? RepPosition::findOrFail($request->id) : new RepPosition();

        $repposition->id = $request->input('repposition_id');
        $repposition->name = $request->input('repposition');

        if ($repposition->save()) {
            return new RepPositionResource($repposition);
        }
    }

    public function destroy($repposition)
    {
        $this->authorize('delete', RepPosition::class);

        DB::table('rep_positions')->where('id', '=', $repposition)->delete();

        return response()->json([
            'msg' => 'Deleted'
        ]);
    }
}
