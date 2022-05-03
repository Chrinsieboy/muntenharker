<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Relation with user and many transactions belong to user
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Relation with category and many transactions belong to one category
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
