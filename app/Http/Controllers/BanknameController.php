<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bankname;
use App\Http\Resources\BankNameResource;
use Illuminate\Support\Facades\DB;

class BanknameController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Bankname::class);
        return Bankname::all();
    }

    public function store(Request $request)
    {
        $this->authorize('store', Bankname::class);
        $bankname = $request->isMethod('patch') ? Bankname::findOrFail($request->id) : new Bankname();

        $bankname->id = $request->input('bankname_id');
        $bankname->name = $request->input('bankname');

        if ($bankname->save()) {
            return new BankNameResource($bankname);
        }
    }

    public function destroy($bankname)
    {
        $this->authorize('delete', Bankname::class);

        DB::table('banknames')->where('id', '=', $bankname)->delete();

        return response()->json([
            'msg' => 'Deleted'
        ]);
    }
}
