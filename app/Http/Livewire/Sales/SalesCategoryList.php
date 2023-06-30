<?php

namespace App\Http\Livewire\Sales;

use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Models\SaleCategory;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\TextInput;
use DB;
class SalesCategoryList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    

    protected function getTableQuery(): Builder
    {
        return SaleCategory::query();
    }

    protected function getTableHeaderActions(){
        return [
            Action::make('new Category')->label('New Sales Category')->button()->icon('heroicon-o-plus')->action(
                function($record, $data){
                   DB::beginTransaction();
                    SaleCategory::create([
                        'name' => $data['name'],
                    ]);
                   DB::commit();
                }
            )->form([
                TextInput::make('name'),
            ]
            )->modalWidth('xl')
        ];
    }

    protected function getTableColumns(): array 
    {
        return [
            TextColumn::make('name')->label('CATEGORY NAME')->searchable()->formatStateUsing(
                function($record){
                    return strtoupper($record->name);
                }
            )
        ];
    }

    protected function getTableActions(): array
    {
        return [ 
            Action::make('edit')->label('Edit')->icon('heroicon-o-pencil-alt')->color('success')->action(
                function($record, $data){
                    $record->update($data);
                }
            )->form(function($record){
                return [
                    TextInput::make('name')->default($record->name),
                ];
            }
            )->modalWidth('lg')->modalHeading('Update Sale Category'),
            Tables\Actions\DeleteAction::make(),
        ]; 
    }

    public function render()
    {
        return view('livewire.sales.sales-category-list');
    }
}
