<?php

// app/Models/Adviser.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Use the User trait for authentication

class Adviser extends Authenticatable // Extend from Authenticatable
{
    use HasFactory;

    protected $fillable = ['email', 'password', 'first_name', 'last_name'];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = ['password'];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function cashLoans()
    {
        return $this->hasMany(CashLoan::class);
    }

    public function homeLoans()
    {
        return $this->hasMany(HomeLoan::class);
    }
}
