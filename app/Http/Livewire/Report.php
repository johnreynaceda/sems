<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SalesTransaction;
use App\Models\ExpenseTransaction;

class Report extends Component
{
    public $report;
    public $date_from, $date_to;
    public function render()
    {
        return view('livewire.report', [
            'reports' => $this->generateReport(),
        ]);
    }

    public function generateReport()
    {
        if ($this->report == 1) {
            return SalesTransaction::when($this->date_from, function ($query) {
                $query->whereDate('dot', '>=', $this->date_from);
            })->when($this->date_to, function ($query) {
                $query->whereDate('dot', '<=', $this->date_to);
            })->get()->take(10);
        } else {
            return ExpenseTransaction::get();
        }
    }
}