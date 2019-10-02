<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountRelationship;
use App\Http\Resources\AccountRelationshipResource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AccountRelationshipController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', AccountRelationship::class);
        return AccountRelationship::all();
    }

    public function store(AccountRelationship $accrelationship)
    {
        $this->authorize('store', $accrelationship);

        $data = request()->validate([
            'name' => 'required|min:3',
        ]);
        AccountRelationship::create($data);
        return response()->json([
            'status' => '201'
        ]);
    }

    public function update(AccountRelationship $accrelationship)
    {
        $this->authorize('update', $accrelationship);

        $accrelationship = AccountRelationship::find(request()->id);

        $accrelationship->name = request()->name;

        $accrelationship->save();

        return (new AccountRelationshipResource($accrelationship))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy($accrelationship)
    {
        $this->authorize('delete', AccountRelationship::class);

        DB::table('account_relationships')->where('id', '=', $accrelationship)->delete();

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
