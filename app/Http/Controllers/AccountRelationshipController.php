<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountRelationship;
use App\Http\Resources\AccountRelationshipResource;
use Illuminate\Support\Facades\DB;

class AccountRelationshipController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', AccountRelationship::class);
        return AccountRelationship::all();
    }

    public function store(Request $request)
    {
        $this->authorize('store', AccountRelationship::class);
        $accrelationship = $request->isMethod('patch') ? AccountRelationship::findOrFail($request->accrelationship_id) : new AccountRelationship();

        $accrelationship->id = $request->input('accrelationship_id');
        $accrelationship->name = $request->input('name');

        if ($accrelationship->save()) {
            return new AccountRelationshipResource($accrelationship);
        }
    }

    public function destroy($accrelationship)
    {
        $this->authorize('delete', AccountRelationship::class);

        DB::table('account_relationships')->where('id', '=', $accrelationship)->delete();

        return response()->json([
            'msg' => 'Deleted'
        ]);
    }
}
