<?php

namespace App\Filament\Resources\CrowdFundResource\Pages;

use App\Filament\Resources\CrowdFundResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCrowdFunds extends ListRecords
{
    protected static string $resource = CrowdFundResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
