<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InsuranceCompanyResource\Pages;
use App\Filament\Resources\InsuranceCompanyResource\RelationManagers;
use App\Models\InsuranceCompany;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InsuranceCompanyResource extends Resource
{
    protected static ?string $model = InsuranceCompany::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Investment';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInsuranceCompanies::route('/'),
            'create' => Pages\CreateInsuranceCompany::route('/create'),
            'edit' => Pages\EditInsuranceCompany::route('/{record}/edit'),
        ];
    }    
}
