<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategoryTransaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function expense_transaction()
    {
        return $this->belongsTo(ExpenseTransaction::class);
    }

    public function expense_category()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }


}