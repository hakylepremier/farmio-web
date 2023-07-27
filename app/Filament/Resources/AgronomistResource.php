<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgronomistResource\Pages;
use App\Filament\Resources\AgronomistResource\RelationManagers;
use App\Models\Agronomist;
use App\Models\Expertise;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AgronomistResource extends Resource
{
    protected static ?string $model = Agronomist::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Agronomist';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('expertise_id')
                ->label('expertise')
                ->options(Expertise::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),
                Forms\Components\DatePicker::make('experience_start_date')->format('Y_m_d')->required(),
                Forms\Components\MarkdownEditor::make('description'),
                Forms\Components\TextInput::make('phone')->required(),
                Forms\Components\FileUpload::make('image')->directory('agronomists')->image(),
                Forms\Components\Section::make('Schedule')
                    ->description('Add schedule to agronomist')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Forms\Components\Repeater::make('schedules')
                        ->relationship('schedules')
                        ->schema([
                            Forms\Components\Select::make('day')
                            ->options([
                                'Sunday' => 'Sunday',
                                'Monday' => 'Monday',
                                'Tuesday' => 'Tuesday',
                                'Wednesday' => 'Wednesday',
                                'Thursday' => 'Thursday',
                                'Friday' => 'Friday',
                                'Saturday' => 'Saturday',
                            ]),
                            Forms\Components\TimePicker::make('start_time'),
                            Forms\Components\TimePicker::make('end_time'),
                        ])->columns(2)
                    ]),
                Forms\Components\Section::make('Reviews')
                    ->description('Add review to agronomist')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Forms\Components\Repeater::make('review')
                        ->relationship('reviews')
                        ->schema([
                            Forms\Components\TextInput::make('rating')->required()->numeric()->minValue(1)->maxValue(5),
                            Forms\Components\MarkdownEditor::make('description'),
                            Forms\Components\Select::make('user_id')
                            ->label('User')
                            ->options(User::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        ])->columns(2)
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label(__('Name')),
                Tables\Columns\ImageColumn::make('image')->label(__('Image')),
                Tables\Columns\TextColumn::make('expertise.name')->label(__('Expertise')),
                Tables\Columns\TextColumn::make('phone')->label(__('Phone')),
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
            'index' => Pages\ListAgronomists::route('/'),
            'create' => Pages\CreateAgronomist::route('/create'),
            'edit' => Pages\EditAgronomist::route('/{record}/edit'),
        ];
    }    
}
