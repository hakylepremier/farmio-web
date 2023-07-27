<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Expertise;
use App\Models\Stage;
use App\Models\TaskCategory;
use App\Models\TaskPriority;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'User Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->required(),
                // 0
                Forms\Components\Section::make('Shops')
                    ->description('Add shops to user')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Forms\Components\Repeater::make('shop')
                        ->relationship('shops')
                        ->schema([
                            Forms\Components\TextInput::make('name')->required(),
                            Forms\Components\MarkdownEditor::make('description'),
                        ])->columns(2)
                    ]),
                Forms\Components\Section::make('Tasks')
                    ->description('Add tasks for your farm management')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Forms\Components\Repeater::make('task')
                        ->relationship('tasks')
                        ->schema([
                            Forms\Components\TextInput::make('title')->required(),
                            Forms\Components\Toggle::make('status')->label(__('Status'))->default(true),
                            Forms\Components\DatePicker::make('date')->format('Y_m_d')->required(),
                            Forms\Components\TimePicker::make('start_time'),
                            Forms\Components\TimePicker::make('end_time'),
                            Forms\Components\CheckboxList::make('farms')
                            ->relationship('farms', 'name'),
                            Forms\Components\Select::make('task_priority_id')
                            ->label('Priority')
                            ->options(TaskPriority::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                            Forms\Components\Select::make('task_category_id')
                            ->label('Category')
                            ->options(TaskCategory::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        ])->columns(2)
                    ]),
                Forms\Components\Section::make('Farms')
                    ->description('Add farms to be used in task')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Forms\Components\Repeater::make('task')
                        ->relationship('tasks')
                        ->schema([
                            Forms\Components\TextInput::make('name')->required(),
                            Forms\Components\FileUpload::make('image')->image(),
                        ])->columns(2)
                    ]),
                Forms\Components\Section::make('Greenhouses')
                    ->description('Add greenhouse the user owns')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Forms\Components\Repeater::make('greenhouse')
                        ->relationship('greenhouses')
                        ->schema([
                            Forms\Components\TextInput::make('name')->required(),//
                            Forms\Components\TextInput::make('location')->required(),//
                            Forms\Components\FileUpload::make('image')->image(),
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
                                    ])->columns(2)
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
