<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            CustomerOrderStatusSeeder::class,
            PaymentTypeSeeder::class,
            DeliveryTypeSeeder::class,
            CurrencySeeder::class,
            ClientSeeder::class,
            GoodSeeder::class,
            CustomerOrderSeeder::class,
        ]);
    }
}
