<?php

namespace Database\Seeders;

use App\Models\Good;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('uk_UA');
        Good::create([
            'name' => 'Аккумуляторная угловая шлифмашина Stark CAG 1800 B Body',
            'slug' => Str::slug('Аккумуляторная угловая шлифмашина Stark CAG 1800 B Body'),
            'part' => 'AR42332',
            'active' => true,
            'description' => $faker->text,
            'photo' => $faker->imageUrl,
            'amount' => 200,
            'price' => 250,
        ]);

        Good::create([
            'name' => 'Угловая шлифмашина Зенит Профи ЗУШ-125/1100',
            'slug' => Str::slug('Угловая шлифмашина Зенит Профи ЗУШ-125/1100'),
            'part' => 'AR42322',
            'active' => true,
            'description' => $faker->text,
            'photo' => $faker->imageUrl,
            'amount' => 200,
            'price' => 300,
        ]);

        Good::create([
            'name' => 'Угловая шлифмашина Bosch Professional GWS 750-125',
            'slug' => Str::slug('Угловая шлифмашина Bosch Professional GWS 750-125'),
            'part' => 'AR42342',
            'active' => true,
            'description' => $faker->text,
            'photo' =>  $faker->imageUrl,
            'amount' => 200,
            'price' => 500 ,
        ]);
    }
}
