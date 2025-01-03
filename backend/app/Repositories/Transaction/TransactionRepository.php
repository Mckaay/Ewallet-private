<?php

declare(strict_types=1);

namespace App\Repositories\Transaction;

use App\Enums\SortingOptions;
use App\Http\Resources\V1\Transaction\TransactionResource;
use App\Models\Transaction;
use DB;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;
use Throwable;

final class TransactionRepository implements TransactionRepositoryInterface
{
    public function all(string $searchQuery = '', int $category = 0, ?string $sort = null): AnonymousResourceCollection
    {
        $query = Transaction::query()->with('category');

        if ( ! empty($searchQuery)) {
            $query->where('name', 'like', "%{$searchQuery}%");
        }

        if ($category > 0) {
            $query->where('category_id', $category);
        }

        $sortOption = SortingOptions::tryFrom(mb_strtolower($sort ?? 'latest')) ?? SortingOptions::LATEST;

        [$column, $direction] = $sortOption->orderBy();
        $query->orderBy($column, $direction);

        return TransactionResource::collection($query->paginate(10));
    }

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

    public function getLatestCategoriesSpendings(int $limit = 3): AnonymousResourceCollection {
        $query = Transaction::query()->with('category')->where('amount','<', 0)->latest()->limit($limit);
        return TransactionResource::collection($query->get());
    }
}
