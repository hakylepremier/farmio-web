<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Ecommerce';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\TextInput::make('price')->required()->numeric()->minValue(1),
                Forms\Components\TextInput::make('weight')->required(),
                Forms\Components\MarkdownEditor::make('description'),
                Forms\Components\Toggle::make('status')->label(__('In Stock'))->default(true),
                Forms\Components\FileUpload::make('product_image')->directory('products')->image(),
                Forms\Components\Select::make('category_id')
                ->label('Category')
                ->options(Category::all()->pluck('name', 'id'))
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
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('price')->money('ghs', true),
                Tables\Columns\TextColumn::make('weight'),
                Tables\Columns\ToggleColumn::make('status')->label('In Stock'),
                Tables\Columns\ImageColumn::make('product_image')->label(__('Image')),
                Tables\Columns\TextColumn::make('category.name')->label(__('Category')),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }    
}
