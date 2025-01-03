<?php

declare(strict_types=1);

namespace App\Repositories\Budget;

use App\Http\Resources\V1\Budget\BudgetCollection;
use App\Models\Budget;
use App\Models\Category;
use App\Models\Theme;
use DB;

final class BudgetRepository implements BudgetRepositoryInterface
{
    public function all(): BudgetCollection
    {
        return new BudgetCollection(Budget::with(['category', 'theme'])->get());
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

    public function getAvailableCategories(): array
    {
        $categories = Category::withCount('budgets')->get();

        return $categories->map(function ($category) {
            return [
                'id'       => $category->id,
                'name'     => $category->name,
                'disabled' => $category->budgets_count > 0,
            ];
        })->toArray();
    }

    public function getAvailableThemes(): array
    {
        $themes = Theme::withCount('budgets')->get();

        return $themes->map(function ($theme) {
            return [
                'id'       => $theme->id,
                'name'     => $theme->name,
                'color'     => $theme->color,
                'disabled' => $theme->budgets_count > 0,
            ];
        })->toArray();
    }
}
