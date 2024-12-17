<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Budget;
use App\Models\Transaction;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $testUser = User::factory()->create([
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $this->call([
            CategorySeeder::class,
            ThemeSeeder::class,
        ]);

        Budget::factory()->count(10)->create();

        Transaction::factory()->count(15)->create(
            [
                'user_id' => $testUser->id,
            ],
        );
    }
}
