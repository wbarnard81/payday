<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sez;
use App\Http\Resources\SezResource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SezController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Sez::class);
        return Sez::all();
    }

    public function store(Sez $sez)
    {
        $this->authorize('store', $sez);

        $data = request()->validate([
            'code' => 'required|min:3',
            'description' => 'required|min:4',
        ]);
        Sez::create($data);
        return response()->json([
            'status' => '201'
        ]);
    }

    public function update(Sez $sez)
    {
        $this->authorize('update', $sez);

        $data = request()->validate([
            'code' => 'required',
            'description' => 'required|min:4',
        ]);

        $sez->update($data);

        return (new SezResource($sez))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy($sez)
    {
        $this->authorize('delete', Sez::class);

        DB::table('sezs')->where('id', '=', $sez)->delete();

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
