<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountType;
use App\Http\Resources\AccountTypeResource;
use Illuminate\Support\Facades\DB;

class AccountTypeController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', AccountType::class);
        return AccountType::all();
    }

    public function store(Request $request)
    {
        $this->authorize('store', AccountType::class);
        $accountType = $request->isMethod('patch') ? AccountType::findOrFail($request->acctype_id) : new AccountType();

        $accountType->id = $request->input('acctype_id');
        $accountType->name = $request->input('acctype');

        if ($accountType->save()) {
            return new AccountTypeResource($accountType);
        }
    }

    public function destroy($accountType)
    {
        $this->authorize('delete', AccountType::class);

        DB::table('employee_types')->where('id', '=', $accountType)->delete();

        return response()->json([
            'msg' => 'Deleted'
        ]);
    }
}
