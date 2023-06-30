<?php

namespace App\Http\Livewire\Sales;

use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Models\SalesTransaction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\TextInput;
use DB;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use App\Models\SaleCategory;
use App\Models\SalesCategoryTransaction;

class SaleTransactionList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return SalesTransaction::query();
    }

    protected function getTableHeaderActions()
    {
        return [
            Action::make('new Category')->label('New Sales Transaction')->button()->icon('heroicon-o-plus')->action(
                function ($record, $data) {
                    
                    $sum = 0;
                    foreach ($data['category_selection'] as $key => $item) {
                        $sum += intval($item['amount']);
                    }
                    DB::beginTransaction();
                     $sale = SalesTransaction::create([
                        'or_number' => $data['or_number'],
                        'name' => $data['name'],
                        'total_amount' => $sum,
                     ]);

                     foreach ($data['category_selection'] as $key => $item) {
                        SalesCategoryTransaction::create([
                            'sales_transaction_id' => $sale->id,
                            'sale_category_id' => $item['sale_category_id'],
                            'amount' => $item['amount'],
                        ]);
                     }
                     
                    DB::commit();
                }
            )->form(
                    [

                        Grid::make(3)
                            ->schema([
                                TextInput::make('or_number')->label('Official Receipt Number')->required()->unique(),
                            ]),
                        Grid::make(1)
                            ->schema([
                                TextInput::make('name')->label('Name')->required(),
                            ]),
                        Repeater::make('category_selection')->label('Category Selection')
                            ->schema([
                                Select::make('sale_category_id')->label('Sale Category')
                                    ->options(SaleCategory::pluck('name', 'id'))
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
            TextColumn::make('or_number')->label('OR Number')->searchable()->formatStateUsing(
                function ($record) {
                    return strtoupper($record->or_number);
                }
            ),
            TextColumn::make('name')->label('FULL NAME')->searchable()->formatStateUsing(
                function ($record) {
                    return strtoupper($record->name);
                }
            ),
            TextColumn::make('total_amount')->label('TOTAL PAYMENT')->searchable()->formatStateUsing(
                function ($record) {
                    return '₱'. number_format($record->total_amount,2);
                }
            )
        ];
    }

    protected function getTableActions(): array
    {
        return [ 
           Action::make('view')->label('View Transaction')->icon('heroicon-o-document-text')->color('success'),
            Tables\Actions\DeleteAction::make(),
        ]; 
    }

    public function render()
    {
        return view('livewire.sales.sale-transaction-list');
    }
}
