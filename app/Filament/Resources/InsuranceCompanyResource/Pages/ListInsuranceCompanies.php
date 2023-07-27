<?php

namespace App\Filament\Resources\InsuranceCompanyResource\Pages;

use App\Filament\Resources\InsuranceCompanyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInsuranceCompanies extends ListRecords
{
    protected static string $resource = InsuranceCompanyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
