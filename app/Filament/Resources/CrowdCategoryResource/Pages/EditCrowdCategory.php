<?php

namespace App\Filament\Resources\CrowdCategoryResource\Pages;

use App\Filament\Resources\CrowdCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCrowdCategory extends EditRecord
{
    protected static string $resource = CrowdCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
