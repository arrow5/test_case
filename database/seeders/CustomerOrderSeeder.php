<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\CustomerOrder;
use App\Models\CustomerOrderStatus;
use App\Models\DeliveryType;
use App\Models\PaymentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CustomerOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = (new Client())->inRandomOrder()->get();
        $status = (new CustomerOrderStatus())->inRandomOrder()->get();
        $deliveryTypes = (new DeliveryType())->inRandomOrder()->get();
        $paymentTypes = (new PaymentType())->inRandomOrder()->get();
        for ($i = 0; $i < 10; $i++){
            CustomerOrder::create([
                'client_id' => $clients->random(1)->first()->id,
                'status_id' => $status->random(1)->first()->id,
                'delivery_type_id' => $deliveryTypes->random(1)->first()->id,
                'payment_type_id' => $paymentTypes->random(1)->first()->id,
                'sum' => random_int(100,5000),
            ]);
        }
    }
}
