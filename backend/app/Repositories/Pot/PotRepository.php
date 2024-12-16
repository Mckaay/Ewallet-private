<?php

declare(strict_types=1);

namespace App\Repositories\Pot;

use App\Http\Resources\V1\Pot\TransactionCollection;
use App\Models\Pot;
use DB;

final class PotRepository implements PotRepositoryInterface
{
    public function all(): TransactionCollection
    {
        return new TransactionCollection(Pot::with(['theme'])->get());
    }

    public function store(array $data): ?Pot
    {
        return DB::transaction(function () use ($data) {
            return Pot::create([
                'user_id' => auth()->id(),
                'name' => $data['name'],
                'target' => $data['limit'],
                'theme_id' => $data['theme_id'],
            ]);
        });
    }

    public function find(int $id): Pot
    {
        return Pot::findorFail($id);
    }

    public function update(Pot $pot, array $data): bool
    {
        return $pot->update([
            'user_id' => auth()->id(),
            'limit' => $data['limit'],
            'theme_id' => $data['theme_id'],
            'category_id' => $data['category_id'],
        ]);
    }

    public function delete(Pot $pot): bool
    {
        $pot->delete();

        return true;
    }
}
