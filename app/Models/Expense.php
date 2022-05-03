<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    // This Model is not being used anymore but still available

    // Relation with user and many Expenses belong to user
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Relation with categorie and many Expenses belong to one category
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
