<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CrowdFundResource\Pages;
use App\Filament\Resources\CrowdFundResource\RelationManagers;
use App\Models\CrowdCategory;
use App\Models\CrowdFund;
use App\Models\Shop;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CrowdFundResource extends Resource
{
    protected static ?string $model = CrowdFund::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Crowd Fund';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\TextInput::make('amount')->required()->numeric()->minValue(1),
                Forms\Components\DatePicker::make('period')->format('Y_m_d')->required(),
                Forms\Components\TextInput::make('location')->required(),
                Forms\Components\MarkdownEditor::make('description'),
                Forms\Components\Toggle::make('active')->label(__('In Stock'))->default(true)->required(),
                Forms\Components\FileUpload::make('image')->image(),
                Forms\Components\Select::make('crowd_category_id')
                ->label('Category')
                ->options(CrowdCategory::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),
                Forms\Components\Select::make('shop_id')
                ->label('Shop')
                ->options(Shop::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),
                Forms\Components\Section::make('Contributions')
                    ->description('Add contributions for the crowd fund campaign')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Forms\Components\Repeater::make('contributions')
                        ->relationship()
                        ->schema([
                            Forms\Components\Select::make('user_id')
                            ->label('Supporter Name')
                            ->options(User::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                            Forms\Components\TextInput::make('contribution')->required()->numeric()->minValue(1),
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
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\ToggleColumn::make('active')->label('Active'),
                Tables\Columns\TextColumn::make('amount')->money('ghs', true),
                Tables\Columns\TextColumn::make('contributions_sum_contribution')->sum('contributions', 'contribution')->label(__('Total Contributions'))->money('ghs', true)->default(0),
                Tables\Columns\TextColumn::make('period')->date(),
                Tables\Columns\TextColumn::make('crowdCategory.name')->label(__('Category')),
                Tables\Columns\TextColumn::make('location'),
                Tables\Columns\TextColumn::make('shop.name')->label(__('Shop')),
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
            'index' => Pages\ListCrowdFunds::route('/'),
            'create' => Pages\CreateCrowdFund::route('/create'),
            'edit' => Pages\EditCrowdFund::route('/{record}/edit'),
        ];
    }    
}
