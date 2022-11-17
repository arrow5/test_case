<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
    ];

    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'phone' => 'string',
    ];

    public function getFullNameAttribute()
    {
        return $this->last_name. ' '. $this->first_name;
    }


}
