<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function lending()
    {
        return $this->hasOne(Lending::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
