<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentMethod;
use App\Http\Resources\PaymentMethodResource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', PaymentMethod::class);
        return PaymentMethod::all();
    }

    public function store(PaymentMethod $paymethod)
    {
        $this->authorize('store', $paymethod);

        $data = request()->validate([
            'name' => 'required|min:3',
        ]);
        PaymentMethod::create($data);
        return response()->json([
            'status' => '201'
        ]);
    }

    public function update(PaymentMethod $paymethod)
    {
        $this->authorize('update', $paymethod);

        $data = request()->validate([
            'name' => 'required|min:3',
        ]);

        $paymethod->update($data);

        return (new PaymentMethodResource($paymethod))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy($paymentmethod)
    {
        $this->authorize('delete', PaymentMethod::class);

        DB::table('payment_methods')->where('id', '=', $paymentmethod)->delete();

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
