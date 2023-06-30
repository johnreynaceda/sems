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
                    dd($sum);
                }
            )->form(
                    [

                        Grid::make(3)
                            ->schema([
                                TextInput::make('or_number')->label('Official Receipt Number')->required(),
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
                                TextInput::make('amount')->required(),
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
            )
        ];
    }
    public function render()
    {
        return view('livewire.sales.sale-transaction-list');
    }
}