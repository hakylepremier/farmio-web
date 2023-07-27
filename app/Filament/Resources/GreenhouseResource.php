<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GreenhouseResource\Pages;
use App\Filament\Resources\GreenhouseResource\RelationManagers;
use App\Models\Greenhouse;
use App\Models\Stage;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GreenhouseResource extends Resource
{
    protected static ?string $model = Greenhouse::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Greenhouse';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')->required(),//
                Forms\Components\TextInput::make('location')->required(),//
                Forms\Components\FileUpload::make('image')->image(),
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\Section::make('Crops')
                    ->description('Add crops and their details to your greenhouse')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Forms\Components\Repeater::make('crops')
                        ->relationship()
                        ->schema([
                            Forms\Components\TextInput::make('name')->required(),//
                            Forms\Components\TextInput::make('variety')->required(),
                            Forms\Components\TextInput::make('plant_number')->required()->numeric()->minValue(1)->label(__('Number of Plants')),
                            Forms\Components\Select::make('stage_id')
                            ->label(__('Stage of Development'))
                            ->options(Stage::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                            Forms\Components\MarkdownEditor::make('description'),
                            Forms\Components\FileUpload::make('image')->image(),
                        ])->columns(2)
                    ])
                    ,
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\ImageColumn::make('image')->label(__('Image')),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('location'),
                Tables\Columns\TextColumn::make('user.name')->label(__('User')),
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
            'index' => Pages\ListGreenhouses::route('/'),
            'create' => Pages\CreateGreenhouse::route('/create'),
            'edit' => Pages\EditGreenhouse::route('/{record}/edit'),
        ];
    }    
}
