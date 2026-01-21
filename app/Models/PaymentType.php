<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    protected $fillable = ['nama']; // wajib agar mass assignment bisa jalan
}
