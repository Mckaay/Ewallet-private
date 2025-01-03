<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Category;
use App\Models\Theme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Budget>
 */
final class BudgetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $themes = Theme::pluck('id')->toArray();
        $categories = Category::pluck('id')->toArray();

        return [
            'user_id' => 1,
            'limit' => $this->faker->numberBetween(1, 20000),
            'category_id' => $this->faker->unique()->randomElement($categories),
            'theme_id' => $this->faker->unique()->randomElement($themes),
        ];
    }
}
