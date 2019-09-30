<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sic7;
use App\Http\Resources\Sic7Resource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class Sic7Controller extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Sic7::class);
        return Sic7::all();
    }

    public function store(Sic7 $sic7)
    {
        $this->authorize('store', $sic7);

        $data = request()->validate([
            'code' => 'required|min:3',
            'description' => 'required|min:4',
        ]);
        Sic7::create($data);
        return response()->json([
            'status' => '201'
        ]);
    }

    public function update(Sic7 $sic7)
    {
        $this->authorize('update', $sic7);

        $data = request()->validate([
            'code' => 'required',
            'description' => 'required|min:4',
        ]);

        $sic7->update($data);

        return (new Sic7Resource($sic7))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy($sic7)
    {
        $this->authorize('delete', Sic7::class);

        DB::table('sic7s')->where('id', '=', $sic7)->delete();

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
