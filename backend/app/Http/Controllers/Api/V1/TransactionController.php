<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreTransactionRequest;
use App\Models\Transaction;
use App\Repositories\Transaction\TransactionRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class TransactionController
{
    public function __construct(protected TransactionRepository $transactionRepository) {}

    public function index(Request $request): JsonResponse
    {
        $transactions = $this->transactionRepository->all(
            searchQuery: $request->get('search') ?? '',
            category: (int) $request->get('category'),
            sort: $request->get('sort') ?? 'latest',
        );

        return response()->json(
            $transactions
                ->response()
                ->getData(true),
        );
    }

    public function store(StoreTransactionRequest $request, TransactionRepository $transactionRepository): JsonResponse
    {
        $transactionRepository->store($request->validated());

        return response()->json(
            status: 204,
        );
    }

    public function update(StoreTransactionRequest $request, Transaction $transaction, TransactionRepository $transactionRepository): JsonResponse
    {
        $transactionRepository->update($transaction, $request->all());

        return response()->json(
            status: 204,
        );
    }

    public function delete(Transaction $transaction, TransactionRepository $transactionRepository): JsonResponse
    {
        $transactionRepository->delete($transaction);

        return response()->json(
            status: 204,
        );
    }
}
