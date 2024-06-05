<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RentHouseResource\Pages;
use App\Filament\Resources\RentHouseResource\RelationManagers;
use App\Models\RentHouse;
use Filament\Actions\ReplicateAction;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class RentHouseResource extends Resource
{
    protected static ?string $model = RentHouse::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Forms\Components\Section::make('Product Information')->schema([
                        TextInput::make('name')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                if (($get('slug') ?? '') !== Str::slug($old)) {
                                    return;
                                }

                                $set('slug', Str::slug($state));
                            }),

                        TextInput::make('slug')
                            ->unique(RentHouse::class, 'slug', ignoreRecord: true)
                            ->readOnly(),
                        Forms\Components\MarkdownEditor::make('description')->columnSpanFull()->fileAttachmentsDirectory('products')
                    ])->columns(2),

                    Forms\Components\Section::make('Images')->schema([
                        Forms\Components\FileUpload::make('images')
                            ->multiple()
                            ->directory('rent_houses')
                            ->maxFiles(5)
                            ->reorderable()
                    ])
                ])->columnSpan(2),

                Group::make()->schema([
                    Forms\Components\Section::make('Price')->schema([
                        Forms\Components\TextInput::make('price')->numeric()->required()->prefix('IDR'),

                        Forms\Components\Section::make('Association')->schema([
                            Forms\Components\Select::make('category_id')->required()->searchable()->preload()->relationship('category', 'name'),
                        ]),

                        Forms\Components\Section::make('Status')->schema([
                            Forms\Components\Toggle::make('is_active')->required()->default(true),
                            Forms\Components\Toggle::make('is_featured')->required()->default(true),
                        ]),
                    ])
                ])->columnSpan(1),
                Forms\Components\Section::make('Features')->schema([
                    Forms\Components\Repeater::make('features')
                        ->relationship()
                        ->schema([
                            Forms\Components\TextInput::make('name'),
                        ]),
                ])
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('category.name')->sortable(),
                Tables\Columns\TextColumn::make('price')->money('IDR')->sortable(),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
                Tables\Columns\IconColumn::make('is_featured')->boolean(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make()
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
            'index' => Pages\ListRentHouses::route('/'),
            'create' => Pages\CreateRentHouse::route('/create'),
            'edit' => Pages\EditRentHouse::route('/{record}/edit'),
        ];
    }
}
