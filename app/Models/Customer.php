<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'nid',
        'address',
        'shopname',
        'photo',
        'bank_account_holder',
        'bank_account_number',
        'bank_account_routing_number',
        'bank_name',
        'bank_branch',
        'city'
    ];
}
