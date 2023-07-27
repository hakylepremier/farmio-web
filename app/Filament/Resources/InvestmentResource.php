<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvestmentResource\Pages;
use App\Filament\Resources\InvestmentResource\RelationManagers;
use App\Models\InsuranceCompany;
use App\Models\Investment;
use App\Models\Shop;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvestmentResource extends Resource
{
    protected static ?string $model = Investment::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Investment';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\TextInput::make('amount')->required()->numeric()->minValue(1),//
                Forms\Components\TextInput::make('roi')->required()->numeric()->minValue(1)->maxValue(100)->label(__('ROI(%)')),//
                Forms\Components\TextInput::make('investor_number')->label(__('Number of Investors'))->required()->numeric()->minValue(1),//
                Forms\Components\TextInput::make('cycle')->label(__('Cycle(Months)'))->required()->numeric()->minValue(1),//
                Forms\Components\DatePicker::make('maturity_date')->format('Y_m_d')->required(),
                Forms\Components\DatePicker::make('closing_date')->format('Y_m_d')->required(),
                Forms\Components\TextInput::make('location')->required(),
                Forms\Components\TextInput::make('investment_type')->required(),
                Forms\Components\Toggle::make('active')->label(__('Active'))->default(true),
                Forms\Components\FileUpload::make('image')->image(),
                Forms\Components\Select::make('insurance_company_id')
                ->label(__('Insurance Partner'))
                ->options(InsuranceCompany::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),
                Forms\Components\Select::make('shop_id')
                ->label('Shop')
                ->options(Shop::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),
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
                Tables\Columns\TextColumn::make('roi')->label(__('ROI(%)')),
                Tables\Columns\TextColumn::make('cycle')->label(__('Cycle(Months)')),
                Tables\Columns\TextColumn::make('maturity_date')->date(),
                Tables\Columns\TextColumn::make('closing_date')->date(),
                Tables\Columns\TextColumn::make('insuranceCompany.name')->label(__('Insurance Partner')),
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
            'index' => Pages\ListInvestments::route('/'),
            'create' => Pages\CreateInvestment::route('/create'),
            'edit' => Pages\EditInvestment::route('/{record}/edit'),
        ];
    }    
}
