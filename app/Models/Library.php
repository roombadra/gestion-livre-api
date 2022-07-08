<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Library extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address','email'];

    public function books() : HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function categories() : HasMany
    {
        return $this->hasMany(Category::class);
    }
}
