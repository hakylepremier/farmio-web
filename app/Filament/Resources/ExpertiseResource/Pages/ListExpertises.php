<?php

namespace App\Filament\Resources\ExpertiseResource\Pages;

use App\Filament\Resources\ExpertiseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExpertises extends ListRecords
{
    protected static string $resource = ExpertiseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
