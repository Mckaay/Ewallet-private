<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Pot;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

final class PotPolicy
{
    use HandlesAuthorization;

    public function viewAny(): bool
    {
        return true;
    }

    public function view(User $user, Pot $pot): bool
    {
        return $user->id === $pot->user_id;
    }

    public function create(): bool
    {
        return auth()->check();
    }

    public function update(User $user, Pot $pot): bool
    {
        return $user->id === $pot->user_id;
    }

    public function delete(User $user, Pot $pot): bool
    {
        return $user->id === $pot->user_id;
    }
}
