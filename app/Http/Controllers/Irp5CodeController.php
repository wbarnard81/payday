<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Irp5Code;
use App\Http\Resources\Irp5CodeResource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class Irp5CodeController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Irp5Code::class);
        return Irp5Code::all();
    }

    public function store(Irp5Code $irp_code)
    {
        $this->authorize('store', $irp_code);

        $data = request()->validate([
            'code' => 'required|min:3',
            'description' => 'required|min:4',
        ]);
        Irp5Code::create($data);
        return response()->json([
            'status' => '201'
        ]);
    }

    public function update(Irp5Code $irp5)
    {
        $this->authorize('update', $irp5);

        $data = request()->validate([
            'code' => 'required',
            'description' => 'required|min:4',
        ]);

        $irp5->update($data);

        return (new Irp5CodeResource($irp5))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy($irp_code)
    {
        $this->authorize('delete', Irp5Code::class);

        DB::table('irp5_codes')->where('id', '=', $irp_code)->delete();

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
