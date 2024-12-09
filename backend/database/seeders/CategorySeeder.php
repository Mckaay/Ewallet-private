<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use Exception;
use Illuminate\Database\Seeder;

final class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws Exception
     */
    public function run(): void
    {
        $filePath = database_path('json/categories.json');

        if ( ! file_exists($filePath)) {
            throw new Exception('Categories.json file does not exist!');
        }

        $categories = json_decode(file_get_contents($filePath), true);

        if ( ! $categories) {
            return;
        }

        foreach ($categories as $category) {
            Category::factory()->create([
                'name' => $category['name'],
            ]);
        }
    }
}
