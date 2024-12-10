<?php

declare(strict_types=1);

namespace App\Repositories\Pot;

use App\Models\Pot;

interface PotRepositoryInterface
{
    public function all();
    public function store(array $data): ?Pot;
    public function find(int $id);
    public function update(Pot $pot, array $data): bool;
    public function delete(Pot $pot): bool;
}
