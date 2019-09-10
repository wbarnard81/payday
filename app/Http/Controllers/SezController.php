<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sez;
use App\Http\Resources\SezResource;
use Illuminate\Support\Facades\DB;

class SezController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Sez::class);
        return Sez::all();
    }

    public function store(Request $request)
    {
        $this->authorize('store', Sez::class);
        $sez = $request->isMethod('patch') ? Sez::findOrFail($request->id) : new Sez();

        $sez->id = $request->input('sez_id');
        $sez->code = $request->input('sez_code');
        $sez->description = $request->input('sez_description');

        if ($sez->save()) {
            return new SezResource($sez);
        }
    }

    public function destroy($sez)
    {
        $this->authorize('delete', Sez::class);

        DB::table('sezs')->where('id', '=', $sez)->delete();

        return response()->json([
            'msg' => 'Deleted'
        ]);
    }
}
