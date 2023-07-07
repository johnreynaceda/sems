<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SalesCategoryTransaction;
use App\Models\ExpenseCategoryTransaction;

class ItemizedTransaction extends Component
{
    public function render()
    {
        return view('livewire.itemized-transaction', [
            'sales' => SalesCategoryTransaction::whereHas('sales_transaction', function ($query) {
                return $query->orderBy('dot', 'desc');
            })->orderBy('created_at', 'desc')->get()->take(5),
            'expenses' => ExpenseCategoryTransaction::whereHas('expense_transaction', function ($query) {
                return $query->orderBy('dot', 'desc');
            })->orderBy('created_at', 'desc')->get()->take(5)
        ]);
    }
}