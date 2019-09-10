<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OtherIdtype;
use App\Http\Resources\OtherIdtypeResource;
use Illuminate\Support\Facades\DB;

class OtherIdtypeController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', OtherIdtype::class);
        return OtherIdtype::all();
    }

    public function store(Request $request)
    {
        $this->authorize('store', OtherIdtype::class);
        $idtype = $request->isMethod('patch') ? OtherIdtype::findOrFail($request->idtype_id) : new OtherIdtype();

        $idtype->id = $request->input('idtype_id');
        $idtype->name = $request->input('otheridtype');

        if ($idtype->save()) {
            return new OtherIdtypeResource($idtype);
        }
    }

    public function destroy($idtype)
    {
        $this->authorize('delete', OtherIdtype::class);

        DB::table('other_idtypes')->where('id', '=', $idtype)->delete();

        return response()->json([
            'msg' => 'Deleted'
        ]);
    }
}
