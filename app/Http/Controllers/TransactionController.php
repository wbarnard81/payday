<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Http\Resources\TransactionResource;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Transaction::class);
        return Transaction::all();
    }

    public function store(Request $request)
    {
        $this->authorize('store', Transaction::class);

        $transaction = $request->isMethod('patch') ? Transaction::findOrFail($request->transaction_id) : new Transaction();

        $transaction->id = $request->input('transaction_id');
        $transaction->employee = $request->input('employee_name');
        $transaction->date = $request->input('date');
        $transaction->employer = $request->input('employer_name');
        $transaction->description = $request->input('description');
        $transaction->irp5_code = $request->input('irp5_code');
        $transaction->amount = $request->input('amount');
        $transaction->note = $request->input('note');

        if ($transaction->save()) {
            return new TransactionResource($transaction);
        }
    }

    public function destroy($transaction)
    {
        $this->authorize('delete', Transaction::class);

        DB::table('transactions')->where('id', '=', $transaction)->delete();

        return response()->json([
            'msg' => 'Deleted'
        ]);
    }
}
