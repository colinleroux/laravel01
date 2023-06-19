<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    use HasUuid;
    protected $fillable = [
        'name',
        'city',
        'country_code'
    ];
    public function books(){
        return $this->hasMany(Book::class);
    }
}
