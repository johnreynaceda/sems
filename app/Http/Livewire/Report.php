<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SalesTransaction;
use App\Models\ExpenseTransaction;

class Report extends Component
{
    public $report = 1;
    public $date_from, $date_to;
    public function render()
    {
        return view('livewire.report', [
            'reports' => $this->generateReport(),
        ]);
    }

    public function updatedReport()
    {
        $this->date_from = null;
        $this->date_to   = null;
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
            return ExpenseTransaction::when($this->date_from, function ($query) {
                $query->whereDate('dot', '>=', $this->date_from);
            })->when($this->date_to, function ($query) {
                $query->whereDate('dot', '<=', $this->date_to);
            })->get()->take(10);
        }
    }
}