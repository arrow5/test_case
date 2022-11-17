<?php

namespace Database\Seeders;

use App\Models\DeliveryType;
use Illuminate\Database\Seeder;

class DeliveryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliveryType::create([
            'name' => 'Самовивіз',
            'active' => true,
        ]);

        DeliveryType::create([
            'name' => 'Нова пошта',
            'active' => true,
        ]);

        DeliveryType::create([
            'name' => 'Укп пошта',
            'active' => true,
        ]);
    }
}
