<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'status_id',
        'delivery_type_id',
        'payment_type_id',
        'sum',
    ];

    protected $casts = [
        'client_id' => 'integer',
        'status_id' => 'integer',
        'delivery_type_id' => 'integer',
        'payment_type_id' => 'integer',
        'sum' => 'float',
    ];

    public function client()
    {
        return $this->hasOne(Client::class,'id','client_id');
    }

    public function status()
    {
        return $this->hasOne(CustomerOrderStatus::class,'id','status_id');
    }

    public function deliveryType()
    {
        return $this->hasOne(DeliveryType::class,'id','delivery_type_id');
    }

    public function paymentType()
    {
        return $this->hasOne(PaymentType::class,'id','payment_type_id');
    }
}
