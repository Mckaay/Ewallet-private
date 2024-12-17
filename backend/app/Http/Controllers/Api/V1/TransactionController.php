<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Resources\V1\Transaction\TransactionResource;
use App\Models\Transaction;
use App\Repositories\Transaction\TransactionRepository;
use Illuminate\Http\JsonResponse;

final class TransactionController
{
    public function __construct(protected TransactionRepository $transactionRepository) {}

    public function index(): JsonResponse
    {
        return response()->json(
            TransactionResource::collection($this->transactionRepository->all()->paginate(5))
                ->response()->
                getData(true),
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
