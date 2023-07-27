<?php

namespace App\Filament\Resources\AgronomistResource\Pages;

use App\Filament\Resources\AgronomistResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAgronomists extends ListRecords
{
    protected static string $resource = AgronomistResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
