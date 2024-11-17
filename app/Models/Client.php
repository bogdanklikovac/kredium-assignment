<?php

// app/Models/Client.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'adviser_id'];

    public function adviser()
    {
        return $this->belongsTo(Adviser::class);
    }

    public function cashLoan()
    {
        return $this->hasOne(CashLoan::class);
    }

    public function homeLoan()
    {
        return $this->hasOne(HomeLoan::class);
    }
}

