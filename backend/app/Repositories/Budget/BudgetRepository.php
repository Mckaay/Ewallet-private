<?php

declare(strict_types=1);

namespace App\Repositories\Budget;

use App\Http\Resources\V1\Budget\BudgetCollection;
use App\Models\Budget;
use DB;
use Illuminate\Support\Facades\Log;
use Throwable;

final class BudgetRepository implements BudgetRepositoryInterface
{
    public function all(): BudgetCollection
    {
        return new BudgetCollection(Budget::with(['category','theme'])->get());
    }

    public function store(array $data): ?Budget
    {
        return DB::transaction(function () use ($data) {
           return Budget::create([
                'user_id' => auth()->id(),
                'limit' => $data['limit'],
                'theme_id' => $data['theme_id'],
                'category_id' => $data['category_id'],
            ]);
        });
    }

    public function find(int $id): Budget
    {
        return Budget::findorFail($id);
    }

    public function update(Budget $budget, array $data): bool
    {
        return $budget->update([
            'user_id' => auth()->id(),
            'limit' => $data['limit'],
            'theme_id' => $data['theme_id'],
            'category_id' => $data['category_id'],
        ]);
    }

    public function delete(Budget $budget): bool
    {
        $budget->delete();

        return true;
    }
}
