<?php

// app/Models/HomeLoan.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeLoan extends Model
{
    use HasFactory;

    protected $fillable = ['property_value', 'down_payment_amount', 'client_id', 'adviser_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function adviser()
    {
        return $this->belongsTo(Adviser::class);
    }
}

