<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountType;
use App\Http\Resources\AccountTypeResource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AccountTypeController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', AccountType::class);
        return AccountType::all();
    }

    public function store(AccountType $accountType)
    {
        $this->authorize('store', $accountType);

        $data = request()->validate([
            'name' => 'required|min:3',
        ]);
        AccountType::create($data);
        return response()->json([
            'status' => '201'
        ]);
    }

    public function update(AccountType $accountType)
    {
        $this->authorize('update', $accountType);

        $accountType = AccountType::find(request()->id);

        $accountType->name = request()->name;

        $accountType->save();

        return (new AccountTypeResource($accountType))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy($accountType)
    {
        $this->authorize('delete', AccountType::class);

        DB::table('account_types')->where('id', '=', $accountType)->delete();

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
