<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrderStatus extends Model
{
    use HasFactory;

    const DEFAULT_STATUS = 1;

    protected $fillable = [
        'name',
        'color',
    ];

    protected $casts = [
        'name' => 'string',
        'color' => 'string',
    ];
}
