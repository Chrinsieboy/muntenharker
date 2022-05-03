<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // These fillables are used to fill the database with data
    protected $fillable = [
        'name',
        'email',
        'password',
        'admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // These data are hashed in the database
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // This data should be casted to a string
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relation with category and user can have many categories
    public function categories() {
        return $this->hasMany(Category::class);
    }
    // Relation with transactions and user can have many transactions
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function spaardoels() {
        return $this->hasMany(Spaardoel::class);
    }
}
