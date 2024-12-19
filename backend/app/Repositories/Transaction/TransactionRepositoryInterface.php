<?php

declare(strict_types=1);

namespace App\Repositories\Transaction;

use App\Models\Transaction;

interface TransactionRepositoryInterface
{
    public function store(array $data): bool;
    public function find(int $id);
    public function update(Transaction $transaction, array $data): bool;
    public function delete(Transaction $transaction): bool;
}
