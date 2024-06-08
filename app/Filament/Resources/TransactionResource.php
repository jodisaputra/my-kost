<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Transaction Information')->schema([
                    Forms\Components\Select::make('user_id')
                        ->label('Customer')
                        ->searchable()
                        ->preload()
                        ->relationship('user', 'name', function ($query) {
                            // Filter users to only include those with the role 'user'
                            return $query->where('role', 'user');
                        })
                        ->required()
                        ->reactive(),

                    Forms\Components\Select::make('rent_house_id')
                        ->label('Rent House')
                        ->searchable()
                        ->preload()
                        ->relationship('rent_house', 'name')
                        ->required()
                        ->options(function (callable $get) {
                            $userId = $get('user_id');

                            if ($userId) {
                                // Fetch rent houses already taken by the selected user
                                $occupiedRentHouseIds = Transaction::where('user_id', $userId)
                                    ->pluck('rent_house_id')
                                    ->toArray();

                                // Get rent houses that are not chosen by the selected user
                                return \App\Models\RentHouse::whereNotIn('id', $occupiedRentHouseIds)
                                    ->pluck('name', 'id')
                                    ->toArray();
                            }

                            // Return an empty array if no user is selected
                            return [];
                        })
                        ->visible(fn(callable $get) => $get('user_id') !== null)
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set) {
                            if ($state) {
                                $rentHouse = \App\Models\RentHouse::find($state);
                                if ($rentHouse) {
                                    $set('grand_total', $rentHouse->price);
                                }
                            }
                        }),

                    TextInput::make('grand_total')
                        ->label('Grand Total')
                        ->required()
                        ->numeric()
                        ->readOnly(),

                    TextInput::make('full_name')
                        ->required(),

                    TextInput::make('phone_number')
                        ->required(),

                    Forms\Components\FileUpload::make('proof_of_payment')
                        ->image()
                        ->directory('proof_of_payment')
                        ->columnSpanFull(),

                    Forms\Components\Select::make('status')
                        ->options([
                            'pending' => 'Pending',
                            'success' => 'Success'
                        ])
                        ->required()
                        ->default('success')
                        ->columnSpanFull(),

                ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User Logged In Name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\ImageColumn::make('proof_of_payment'),

                Tables\Columns\TextColumn::make('full_name')
                    ->label('Full Name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('phone_number')
                    ->label('Phone Number')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('grand_total')
                    ->numeric()
                    ->sortable()
                    ->money('IDR'),

                Tables\Columns\SelectColumn::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'success' => 'Success'
                    ])->searchable()->sortable(),

                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true)
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
