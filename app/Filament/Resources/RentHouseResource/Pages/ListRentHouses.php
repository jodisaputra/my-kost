<?php

namespace App\Filament\Resources\RentHouseResource\Pages;

use App\Filament\Resources\RentHouseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRentHouses extends ListRecords
{
    protected static string $resource = RentHouseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
