<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sic7;
use App\Http\Resources\Sic7Resource;
use Illuminate\Support\Facades\DB;

class Sic7Controller extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Sic7::class);
        return Sic7::all();
    }

    public function store(Request $request)
    {
        $this->authorize('store', Sic7::class);
        $sic7 = $request->isMethod('patch') ? Sic7::findOrFail($request->sic7_id) : new Sic7();

        $sic7->id = $request->input('sic7_id');
        $sic7->code = $request->input('sic7_code');
        $sic7->description = $request->input('sic7_description');

        if ($sic7->save()) {
            return new Sic7Resource($sic7);
        }
    }

    public function destroy($sic7)
    {
        $this->authorize('delete', Sic7::class);

        DB::table('sic7s')->where('id', '=', $sic7)->delete();

        return response()->json([
            'msg' => 'Deleted'
        ]);
    }
}
