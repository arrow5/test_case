<?php

namespace Database\Seeders;

use App\Models\Client;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facker_ru = Factory::create('uk_UA');
        for($i = 0; $i < 10; $i++){
            Client::create([
                'first_name' => $facker_ru->firstName,
                'last_name' => $facker_ru->lastName,
                //'middle_name' => ,
                'email' => $facker_ru->email,
                'phone' => $facker_ru->phoneNumber,
            ]);
        }
    }
}
