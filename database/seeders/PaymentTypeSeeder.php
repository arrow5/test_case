<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentType::create([
            'name' => 'Готівкою при отриманні',
            'active' => true
        ]);

        PaymentType::create([
            'name' => 'Оплата онлайн картою',
            'active' => true,
        ]);
    }
}
