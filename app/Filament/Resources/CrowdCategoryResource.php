<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CrowdCategoryResource\Pages;
use App\Filament\Resources\CrowdCategoryResource\RelationManagers;
use App\Models\CrowdCategory;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CrowdCategoryResource extends Resource
{
    protected static ?string $model = CrowdCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Crowd Fund';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListCrowdCategories::route('/'),
            'create' => Pages\CreateCrowdCategory::route('/create'),
            'edit' => Pages\EditCrowdCategory::route('/{record}/edit'),
        ];
    }    
}
