<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function expense_category_transactions()
    {
        return $this->hasMany(ExpenseCategoryTransaction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}