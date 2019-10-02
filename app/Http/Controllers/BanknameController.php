<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bankname;
use App\Http\Resources\BankNameResource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class BanknameController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Bankname::class);
        return Bankname::all();
    }

    public function store(Bankname $bankname)
    {
        $this->authorize('store', $bankname);

        $data = request()->validate([
            'name' => 'required|min:3',
        ]);
        Bankname::create($data);
        return response()->json([
            'status' => '201'
        ]);
    }

    public function update(Bankname $bankname)
    {
        $this->authorize('update', $bankname);

        $bankname = Bankname::find(request()->id);

        $bankname->name = request()->name;

        $bankname->save();

        return (new BanknameResource($bankname))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy($bankname)
    {
        $this->authorize('delete', Bankname::class);

        DB::table('banknames')->where('id', '=', $bankname)->delete();

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
