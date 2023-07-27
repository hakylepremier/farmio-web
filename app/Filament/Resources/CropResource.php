<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CropResource\Pages;
use App\Filament\Resources\CropResource\RelationManagers;
use App\Models\Crop;
use App\Models\Greenhouse;
use App\Models\Stage;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CropResource extends Resource
{
    protected static ?string $model = Crop::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Greenhouse';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),//
                Forms\Components\TextInput::make('variety')->required(),
                Forms\Components\TextInput::make('plant_number')->required()->numeric()->minValue(1)->label(__('Number of Plants')),
                Forms\Components\MarkdownEditor::make('description'),
                Forms\Components\FileUpload::make('image')->image(),
                Forms\Components\Select::make('stage_id')
                ->label(__('Stage of Development'))
                ->options(Stage::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),
                Forms\Components\Select::make('greenhouse_id')
                ->label(__('Greenhouse'))
                ->options(Greenhouse::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label(__('Image')),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('variety'),
                Tables\Columns\TextColumn::make('plant_number')->label(__('Number of Plants')),
                Tables\Columns\TextColumn::make('stage.name')->label(__('Stage')),
                Tables\Columns\TextColumn::make('greenhouse.name')->label(__('Greenhouse')),
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
            'index' => Pages\ListCrops::route('/'),
            'create' => Pages\CreateCrop::route('/create'),
            'edit' => Pages\EditCrop::route('/{record}/edit'),
        ];
    }    
}
