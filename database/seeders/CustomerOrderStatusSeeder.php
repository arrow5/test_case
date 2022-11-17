<?php

namespace Database\Seeders;

use App\Models\CustomerOrderStatus;
use Illuminate\Database\Seeder;

class CustomerOrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomerOrderStatus::create([
            'name' => 'Новий',
            'color' => '#007bff',
        ]);

        CustomerOrderStatus::create([
            'name' => 'В роботі',
            'color' => '#ffc107',
        ]);

        CustomerOrderStatus::create([
            'name' => 'Відправлено',
            'color' => '#17a2b8',
        ]);

        CustomerOrderStatus::create([
            'name' => 'Скасований',
            'color' => '#dc3545',
        ]);

        CustomerOrderStatus::create([
            'name' => 'Виконано',
            'color' => '#28a745',
        ]);
    }
}
