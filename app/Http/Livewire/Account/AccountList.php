<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\TextInput;
use DB;

class AccountList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return User::query();
    }

    protected function getTableHeaderActions()
    {
        return [
            Action::make('new account')->label('New Account')->button()->icon('heroicon-o-plus')->action(
                function ($record, $data) {
                    DB::beginTransaction();
                    User::create(
                        [
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'password' => bcrypt($data['password']),
                        ]
                    );
                    DB::commit();
                }
            )->form(
                    [
                        TextInput::make('name')->required(),
                        TextInput::make('email')->required(),
                        TextInput::make('password')->password()->required(),
                    ]
                )->modalWidth('xl')
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->label('NAME')->searchable()->formatStateUsing(
                function ($record) {
                    return strtoupper($record->name);
                }
            ),
            TextColumn::make('email')->label('EMAIL')->searchable()
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('edit')->label('Edit')->icon('heroicon-o-pencil-alt')->color('success')->action(
                function ($record, $data) {
                    $record->update($data);
                }
            )->form(
                    function ($record) {
                        return [
                            TextInput::make('name')->default($record->name)->required(),
                            TextInput::make('email')->default($record->email)->required(),
                            TextInput::make('password')->password()->required(),
                        ];
                    }
                )->modalWidth('lg')->modalHeading('Update User Details'),
            Tables\Actions\DeleteAction::make(),
        ];
    }

    public function render()
    {
        return view('livewire.account.account-list');
    }
}