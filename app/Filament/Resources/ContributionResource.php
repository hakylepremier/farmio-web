<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContributionResource\Pages;
use App\Filament\Resources\ContributionResource\RelationManagers;
use App\Models\Category;
use App\Models\Contribution;
use App\Models\CrowdFund;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContributionResource extends Resource
{
    protected static ?string $model = Contribution::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Crowd Fund';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('crowd_fund_id')
                ->label('Campaign Name')
                ->options(CrowdFund::all()->pluck('title', 'id'))
                ->searchable()
                ->required(),
                Forms\Components\Select::make('user_id')
                ->label('Supporter Name')
                ->options(User::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),
                Forms\Components\TextInput::make('contribution')->required()->numeric()->minValue(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
                Tables\Columns\TextColumn::make('crowdFund.title')->label(__('Campaign')),
                Tables\Columns\TextColumn::make('contribution')->money('ghs', true),
                Tables\Columns\TextColumn::make('user.name')->label(__('Supporter')),
                Tables\Columns\TextColumn::make('crowdFund.shop.name')->label(__('Campaign Organiser')),
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
            'index' => Pages\ListContributions::route('/'),
            'create' => Pages\CreateContribution::route('/create'),
            'edit' => Pages\EditContribution::route('/{record}/edit'),
        ];
    }    
}
