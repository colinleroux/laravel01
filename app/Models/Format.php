<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Format extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable=[
      'name',
      'description',
    ];
}
