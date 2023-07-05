<?php

namespace App\Http\Livewire\Expense;

use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Models\ExpenseTransaction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\TextInput;
use DB;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use App\Models\ExpenseCategory;
use App\Models\ExpenseCategoryTransaction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;

class ExpenseTransactionList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    public $view_transaction = false;
    public $transaction_data = [];
    public $note;
    protected function getTableQuery(): Builder
    {
        return ExpenseTransaction::query();
    }

    protected function getTableHeaderActions()
    {
        return [
            Action::make('new Category')->label('New Expense Transaction')->button()->icon('heroicon-o-plus')->action(
                function ($record, $data) {

                    $sum = 0;
                    foreach ($data['category_selection'] as $key => $item) {
                        $sum += intval($item['amount']);
                    }
                    DB::beginTransaction();
                    $expense = ExpenseTransaction::create([
                        'voucher_number' => $data['voucher_number'],
                        'name' => $data['name'],
                        'total_amount' => $sum,
                        'note' => $data['note'],
                        'user_id' => auth()->user()->id,
                        'dot' => $data['dot'],
                    ]);

                    foreach ($data['category_selection'] as $key => $item) {
                        ExpenseCategoryTransaction::create([
                            'expense_transaction_id' => $expense->id,
                            'expense_category_id' => $item['expense_category_id'],
                            'amount' => $item['amount'],
                        ]);
                    }

                    DB::commit();
                }
            )->form(
                    [

                        Grid::make(3)
                            ->schema([
                                TextInput::make('voucher_number')->label('Voucher Number')->required()->unique(),
                                DatePicker::make('dot')->label('Date of Transaction')->required(),
                            ]),
                        Grid::make(1)
                            ->schema([
                                TextInput::make('name')->label('Name')->required(),
                            ]),
                        Textarea::make('note')->required(),
                        Repeater::make('category_selection')->label('Category Selection')
                            ->schema([
                                Select::make('expense_category_id')->label('Expense Category')
                                    ->options(ExpenseCategory::pluck('name', 'id'))
                                    ->required(),
                                TextInput::make('amount')->numeric()->required()->prefix('₱'),
                            ])
                            ->columns(2)->collapsible()
                    ]
                )
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('voucher_number')->label('VOUCHER NUMBER')->searchable()->formatStateUsing(
                function ($record) {
                    return strtoupper($record->voucher_number);
                }
            ),
            TextColumn::make('name')->label('FULL NAME')->searchable()->formatStateUsing(
                function ($record) {
                    return strtoupper($record->name);
                }
            ),
            TextColumn::make('total_amount')->label('TOTAL PAYMENT')->searchable()->formatStateUsing(
                function ($record) {
                    return '₱' . number_format($record->total_amount, 2);
                }
            ),
            TextColumn::make('note')->label('NOTE')->searchable()->words(5)
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('view')->label('View Transaction')->icon('heroicon-o-document-text')->color('success')->action(
                function ($record) {
                    $this->transaction_data = $record->expense_category_transactions;
                    $this->note             = $record->note;
                    $this->view_transaction = true;
                }
            ),
            Tables\Actions\DeleteAction::make(),
        ];
    }

    public function render()
    {
        return view('livewire.expense.expense-transaction-list');
    }
}