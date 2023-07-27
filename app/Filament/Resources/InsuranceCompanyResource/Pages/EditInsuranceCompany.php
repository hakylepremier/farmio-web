<?php

namespace App\Filament\Resources\InsuranceCompanyResource\Pages;

use App\Filament\Resources\InsuranceCompanyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInsuranceCompany extends EditRecord
{
    protected static string $resource = InsuranceCompanyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
