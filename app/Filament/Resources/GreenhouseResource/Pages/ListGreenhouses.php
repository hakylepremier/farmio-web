<?php

namespace App\Filament\Resources\GreenhouseResource\Pages;

use App\Filament\Resources\GreenhouseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGreenhouses extends ListRecords
{
    protected static string $resource = GreenhouseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
