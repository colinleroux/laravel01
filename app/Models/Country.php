<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    use HasUuid;
    protected $fillable = [
        'Country',
        'Alpha-2 code',
        'Alpha-3 code',
        'Numeric'
    ];
}
