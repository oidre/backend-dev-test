<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'description', 'author', 'published_year'];
}
