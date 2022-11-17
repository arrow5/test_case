<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "short_name",
        "name_iso",
        "code_iso",
        "symbol_iso",
        "active",
        "name1",
        "name2",
        "name3",
    ];
}
