<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Http\Resources\TransactionResource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Transaction::class);
        return Transaction::all();
    }

    public function store(Transaction $transaction)
    {
        $this->authorize('store', $transaction);

        $data = request()->validate([
            'employee_name' => 'required|min:3',
            'date' => 'required|date',
            'employer_name' => 'required|min:3',
            'description' => 'required|min:4',
            'irp5_code' => 'required',
            'amount' => 'required|numeric',
            'note' => 'required|min:4',
        ]);
        Transaction::create($data);
        return response()->json([
            'status' => '201'
        ]);
    }

    public function update(Transaction $transaction)
    {
        $this->authorize('update', $transaction);

        $data = request()->validate([
            'employee_name' => 'required|min:3',
            'date' => 'required|date',
            'employer_name' => 'required|min:3',
            'description' => 'required|min:4',
            'irp5_code' => 'required',
            'amount' => 'required|numeric',
            'note' => 'required|min:4',
        ]);

        $transaction->update($data);

        return (new TransactionResource($transaction))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy($transaction)
    {
        $this->authorize('delete', Transaction::class);

        DB::table('transactions')->where('id', '=', $transaction)->delete();

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
