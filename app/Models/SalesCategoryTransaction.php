<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesCategoryTransaction extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sales_transaction()
    {
        return $this->belongsTo(SalesTransaction::class);
    }

    public function sale_category()
    {
        return $this->belongsTo(SaleCategory::class);
    }
}