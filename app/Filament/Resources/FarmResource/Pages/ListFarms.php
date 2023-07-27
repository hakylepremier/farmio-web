<?php

namespace App\Filament\Resources\FarmResource\Pages;

use App\Filament\Resources\FarmResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFarms extends ListRecords
{
    protected static string $resource = FarmResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
