<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Http\Resources\CountryResource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Country::class);
        return Country::all();
    }

    public function store(Country $country)
    {
        $this->authorize('store', $country);

        $data = request()->validate([
            'code' => 'required|min:3',
            'name' => 'required|min:4',
        ]);
        Country::create($data);
        return response()->json([
            'status' => '201'
        ]);
    }

    public function update(Country $country)
    {
        $this->authorize('update', $country);

        $data = request()->validate([
            'code' => 'required|min:3',
            'name' => 'required|min:4',
        ]);

        $country->update($data);

        return (new CountryResource($country))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy($country)
    {
        $this->authorize('delete', Country::class);

        DB::table('countries')->where('id', '=', $country)->delete();

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
