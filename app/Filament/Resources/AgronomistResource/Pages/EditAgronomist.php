<?php

namespace App\Filament\Resources\AgronomistResource\Pages;

use App\Filament\Resources\AgronomistResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAgronomist extends EditRecord
{
    protected static string $resource = AgronomistResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
