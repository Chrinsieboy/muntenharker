<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Relation with user and many categories belong to user
    public function users() {
        return $this->belongsToMany(User::class,'categories');
    }
    // Relation with transactions and category can have many transactions
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
