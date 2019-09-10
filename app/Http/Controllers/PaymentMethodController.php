<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentMethod;
use App\Http\Resources\PaymentMethodResource;
use Illuminate\Support\Facades\DB;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', PaymentMethod::class);
        return PaymentMethod::all();
    }

    public function store(Request $request)
    {
        $this->authorize('store', PaymentMethod::class);
        $paymethod = $request->isMethod('patch') ? PaymentMethod::findOrFail($request->paymethod_id) : new PaymentMethod();

        $paymethod->id = $request->input('paymethod_id');
        $paymethod->name = $request->input('name');

        if ($paymethod->save()) {
            return new PaymentMethodResource($paymethod);
        }
    }

    public function destroy($paymethod)
    {
        $this->authorize('delete', PaymentMethod::class);

        DB::table('payment_methods')->where('id', '=', $paymethod)->delete();

        return response()->json([
            'msg' => 'Deleted'
        ]);
    }
}
