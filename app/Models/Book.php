<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'description', 'disponible', 'library_id', 'category_id'];

    public function library() : BelongsTo
    {
        return $this->belongsTo(Library::class);
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author() : BelongsTo
    {
        return $this->BelongsTo(Author::class);
    }

}
