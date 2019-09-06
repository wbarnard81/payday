<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Http\Resources\CountryResource;
use Illuminate\Support\Facades\DB;

class Irp5CodeController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Country::class);
        return Country::all();
    }

    public function store(Request $request)
    {
        $this->authorize('store', Country::class);
        $country = $request->isMethod('patch') ? Country::findOrFail($request->id) : new Country();

        $country->id = $request->input('country_id');
        $country->code = $request->input('country_code');
        $country->name = $request->input('country_name');

        if ($country->save()) {
            return new CountryResource($country);
        }
    }

    public function destroy($country)
    {
        $this->authorize('delete', Country::class);

        DB::table('countries')->where('id', '=', $country)->delete();

        return response()->json([
            'msg' => 'Deleted'
        ]);
    }
}
