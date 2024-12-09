<?php

declare(strict_types=1);

namespace Tests\Feature;

use Database\Seeders\ThemeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class DefaultThemesTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_there_are_default_categories_after_seeding(): void
    {
        $this->seed(ThemeSeeder::class);
        $this->assertDatabaseCount('themes', 15);
    }
}
