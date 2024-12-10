<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Budget;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

final class BudgetPolicy
{
    use HandlesAuthorization;

    public function viewAny(): bool
    {
        return true;
    }

    public function view(User $user, Budget $budget): bool
    {
        return $user->id === $budget->user_id;
    }

    public function create(): bool
    {
        return auth()->check();
    }

    public function update(User $user, Budget $budget): bool
    {
        return $user->id === $budget->user_id;
    }

    public function delete(User $user, Budget $budget): bool
    {
        return $user->id === $budget->user_id;
    }
}
