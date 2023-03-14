<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{



    //protected $fillable = ['title', 'series', 'isbn13', 'edition', 'is_fiction', 'language', 'published', 'format', 'paperback', 'publisher_id'];
    protected $table='books';
    use HasFactory;
}
