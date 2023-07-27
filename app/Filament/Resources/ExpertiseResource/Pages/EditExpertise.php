<?php

namespace App\Filament\Resources\ExpertiseResource\Pages;

use App\Filament\Resources\ExpertiseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExpertise extends EditRecord
{
    protected static string $resource = ExpertiseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
