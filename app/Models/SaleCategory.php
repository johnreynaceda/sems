<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sales_category_transactions()
    {
        return $this->hasMany(SalesCategoryTransaction::class);
    }
}