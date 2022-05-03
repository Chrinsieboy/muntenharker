<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spaardoel extends Model
{
    use HasFactory;

    // Relation with user and many savingsgoals belong to user
    public function users() {
        return $this->hasMany(User::class);
    }
}
