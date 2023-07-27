<?php

namespace App\Filament\Resources\CrowdCategoryResource\Pages;

use App\Filament\Resources\CrowdCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCrowdCategories extends ListRecords
{
    protected static string $resource = CrowdCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
