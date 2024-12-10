<?php

declare(strict_types=1);

namespace App\Repositories\Budget;

use App\Models\Budget;

interface BudgetRepositoryInterface
{
    public function all();
    public function store(array $data): ?Budget;
    public function find(int $id);
    public function update(Budget $budget, array $data): bool;
    public function delete(Budget $budget): bool;
}
