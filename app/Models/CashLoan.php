<?php

// app/Models/CashLoan.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashLoan extends Model
{
    use HasFactory;

    protected $fillable = ['loan_amount', 'client_id', 'adviser_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function adviser()
    {
        return $this->belongsTo(Adviser::class);
    }
}

