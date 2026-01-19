<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop Gaming Pro',
                'description' => 'High-performance laptop with RTX 4060, 16GB RAM, 512GB SSD. Perfect for gaming and content creation.',
                'price' => 1299.99,
                'quantity' => 15,
            ],
            [
                'name' => 'Wireless Mouse',
                'description' => 'Ergonomic wireless mouse with precision tracking and long battery life.',
                'price' => 29.99,
                'quantity' => 150,
            ],
            [
                'name' => 'Mechanical Keyboard',
                'description' => 'RGB mechanical keyboard with blue switches and customizable lighting.',
                'price' => 89.99,
                'quantity' => 75,
            ],
            [
                'name' => '27" Monitor 4K',
                'description' => 'Ultra HD monitor with HDR support and 144Hz refresh rate.',
                'price' => 399.99,
                'quantity' => 30,
            ],
            [
                'name' => 'USB-C Hub',
                'description' => '7-in-1 USB-C hub with HDMI, USB 3.0 ports, and SD card reader.',
                'price' => 49.99,
                'quantity' => 200,
            ],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
