<?php

declare(strict_types=1);

namespace App\Repositories\Transaction;

use App\Models\Transaction;
use DB;
use Illuminate\Support\Facades\Log;
use Throwable;

final class TransactionRepository implements TransactionRepositoryInterface
{
    public function all()
    {
        return Transaction::query()->with('category');
    }

    /**
     * @throws Throwable
     */
    public function store(array $data): bool
    {
        try {
            DB::transaction(callback: function () use ($data) {
                Transaction::create([
                    'user_id' => auth()->id(),
                    'category_id' => $data['category_id'],
                    'amount' => $data['amount'],
                    //                    'recurring' => $data['recurring'] ?? false,
                    'name' => $data['name'],
                    'date' => $data['date'],
                ]);

                return true;
            });
        } catch (Throwable $exception) {
            Log::error($exception->getMessage());
        }

        return false;
    }

    public function find(int $id): Transaction
    {
        return Transaction::findorFail($id);
    }

    public function update(Transaction $transaction, array $data): bool
    {
        return $transaction->update($data);
    }

    public function delete(Transaction $transaction): bool
    {
        try {
            DB::transaction(callback: function () use ($transaction) {
                $transaction->delete();
                return true;
            });
        } catch (Throwable $exception) {
            Log::error($exception->getMessage());
        }

        return true;
    }
}
