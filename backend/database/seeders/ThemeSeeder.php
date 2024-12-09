<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Theme;
use Exception;
use Illuminate\Database\Seeder;

final class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = database_path('json/themes.json');

        if ( ! file_exists($filePath)) {
            throw new Exception('Themes.json file does not exist!');
        }

        $themes = json_decode(file_get_contents($filePath), true);

        if ( ! $themes) {
            return;
        }

        foreach ($themes as $theme) {
            Theme::factory()->create([
                'name' => $theme['name'],
                'color' => $theme['color'],
            ]);
        }
    }
}
