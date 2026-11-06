<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    // ADMIN: lihat semua transaksi
    public function index()
    {
        $data = Transaction::with(['customer', 'book'])->latest()->get();

        return response()->json(['status' => 'success', 'data' => $data]);
    }

    // CUSTOMER: buat transaksi
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'book_id'      => 'required|exists:books,id',
            'total_amount' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $trx = Transaction::create([
            'order_number' => 'TRX-' . strtoupper(Str::random(8)),
            'customer_id'  => $request->user()->id,
            'book_id'      => $request->book_id,
            'total_amount' => $request->total_amount,
        ]);

        return response()->json(['status' => 'success', 'data' => $trx], 201);
    }

    // CUSTOMER: lihat transaksi miliknya sendiri
    public function show(Request $request, $id)
    {
        $trx = Transaction::with(['customer', 'book'])
            ->where('customer_id', $request->user()->id)
            ->find($id);

        if (! $trx) {
            return response()->json(['status' => 'error', 'message' => 'Transaction not found'], 404);
        }

        return response()->json(['status' => 'success', 'data' => $trx]);
    }

    // CUSTOMER: ubah transaksi miliknya sendiri
    public function update(Request $request, $id)
    {
        $trx = Transaction::where('customer_id', $request->user()->id)->find($id);

        if (! $trx) {
            return response()->json(['status' => 'error', 'message' => 'Transaction not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'book_id'      => 'sometimes|exists:books,id',
            'total_amount' => 'sometimes|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $trx->update($request->only('book_id', 'total_amount'));

        return response()->json(['status' => 'success', 'data' => $trx]);
    }

    // ADMIN: hapus transaksi
    public function destroy($id)
    {
        $trx = Transaction::find($id);

        if (! $trx) {
            return response()->json(['status' => 'error', 'message' => 'Transaction not found'], 404);
        }

        $trx->delete();

        return response()->json(['status' => 'success', 'message' => 'Transaction deleted']);
    }
}