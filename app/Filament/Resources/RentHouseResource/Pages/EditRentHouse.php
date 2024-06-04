<?php

namespace App\Filament\Resources\RentHouseResource\Pages;

use App\Filament\Resources\RentHouseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRentHouse extends EditRecord
{
    protected static string $resource = RentHouseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
