<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

final class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'amount' => $this->faker->randomFloat(2, -20000, 20000),
            //            'recurring' => $this->faker->boolean(),
            'date' => Carbon::now(),
            'user_id' => User::factory(),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
