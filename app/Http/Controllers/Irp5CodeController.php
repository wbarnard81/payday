<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Irp5Code;
use App\Http\Resources\Irp5CodeResource;
use Illuminate\Support\Facades\DB;

class Irp5CodeController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Irp5Code::class);
        return Irp5Code::all();
    }

    public function store(Request $request)
    {
        $this->authorize('store', Irp5Code::class);
        $irp_code = $request->isMethod('patch') ? Irp5Code::findOrFail($request->irp5codes_id) : new Irp5Code();

        $irp_code->id = $request->input('irp5codes_id');
        $irp_code->code = $request->input('irp5codes_code');
        $irp_code->description = $request->input('irp5codes_description');

        if ($irp_code->save()) {
            return new Irp5CodeResource($irp_code);
        }
    }

    public function destroy($irp_code)
    {
        $this->authorize('delete', Irp5Code::class);

        DB::table('irp5_codes')->where('id', '=', $irp_code)->delete();

        return response()->json([
            'msg' => 'Deleted'
        ]);
    }
}
