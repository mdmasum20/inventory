<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'expense_name',
        'expense_details',
        'expense_amount',
        'expense_date',
        'expense_date',
        'expense_month',
        'expense_year'
    ];
}
