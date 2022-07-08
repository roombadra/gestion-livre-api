<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'genre','book_price', 'library_id'];

    public function library() : BelongsTo
    {
        return $this->belongsTo(Library::class);
    }

    public function books() : HasMany
    {
        return $this->hasMany(Book::class);
    }


}
