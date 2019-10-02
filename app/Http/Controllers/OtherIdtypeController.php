<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OtherIdtype;
use App\Http\Resources\OtherIdtypeResource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class OtherIdtypeController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', OtherIdtype::class);
        return OtherIdtype::all();
    }

    public function store(OtherIdtype $idtype)
    {
        $this->authorize('store', $idtype);

        $data = request()->validate([
            'name' => 'required|min:3',
        ]);
        OtherIdtype::create($data);
        return response()->json([
            'status' => '201'
        ]);
    }

    public function update(OtherIdtype $idtype)
    {
        $this->authorize('update', $idtype);

        $idtype = OtherIdtype::find(request()->id);

        $idtype->name = request()->name;

        $idtype->save();

        return (new OtherIdtypeResource($idtype))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy($idtype)
    {
        $this->authorize('delete', OtherIdtype::class);

        DB::table('other_idtypes')->where('id', '=', $idtype)->delete();

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
