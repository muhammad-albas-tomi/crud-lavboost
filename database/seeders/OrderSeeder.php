<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            [
                'order_number' => 'ORD-001',
                'customer_name' => 'John Doe',
                'customer_email' => 'john@example.com',
                'customer_phone' => '+1234567890',
                'total_amount' => 1329.98,
                'status' => 'completed',
                'notes' => 'Express delivery requested',
            ],
            [
                'order_number' => 'ORD-002',
                'customer_name' => 'Jane Smith',
                'customer_email' => 'jane@example.com',
                'customer_phone' => '+0987654321',
                'total_amount' => 89.99,
                'status' => 'processing',
                'notes' => 'Gift wrapping needed',
            ],
            [
                'order_number' => 'ORD-003',
                'customer_name' => 'Bob Johnson',
                'customer_email' => 'bob@example.com',
                'customer_phone' => '+1122334455',
                'total_amount' => 499.99,
                'status' => 'pending',
                'notes' => null,
            ],
        ];

        foreach ($orders as $order) {
            \App\Models\Order::create($order);
        }
    }
}
