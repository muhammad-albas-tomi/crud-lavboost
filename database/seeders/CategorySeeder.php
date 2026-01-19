<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'description' => 'Computers, laptops, and electronic accessories',
                'slug' => 'electronics-' . time() . '1',
                'is_active' => true,
            ],
            [
                'name' => 'Accessories',
                'description' => 'Computer accessories and peripherals',
                'slug' => 'accessories-' . time() . '2',
                'is_active' => true,
            ],
            [
                'name' => 'Gaming',
                'description' => 'Gaming equipment and gear',
                'slug' => 'gaming-' . time() . '3',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
