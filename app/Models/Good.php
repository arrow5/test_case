<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Good extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_id',
        'slug',
        'active',
        'main_show',
        'merchant_active',
        'photo',
        'amount',
        'price',
        'price_two',
    ];

    protected $casts = [
        'name' => 'string',
        'type_id' => 'integer',
        'slug' => 'string',
        'active' => 'boolean',
        'main_show' => 'boolean',
        'merchant_active' => 'boolean',
        'photo' => 'string',
        'amount' => 'integer',
        'price' => 'float',
        'price_two' => 'float',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
        $this->attributes['name'] = $value;
    }

    public function scopeActive($query)
    {
        $query->where('active',true);
    }

}
