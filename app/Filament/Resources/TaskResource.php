<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Models\Task;
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

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Farm Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\Toggle::make('status')->label(__('Status'))->default(true),
                Forms\Components\DatePicker::make('date')->format('Y_m_d')->required(),
                Forms\Components\TimePicker::make('start_time'),
                Forms\Components\TimePicker::make('end_time'),
                Forms\Components\CheckboxList::make('farms')
                ->relationship('farms', 'name'),
                Forms\Components\Select::make('user_id')
                ->label('User')
                ->options(User::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\ToggleColumn::make('status')->label('Status'),
                Tables\Columns\TextColumn::make('start_time')->time(),
                Tables\Columns\TextColumn::make('end_time')->time(),
                Tables\Columns\TextColumn::make('date')->date(),
                Tables\Columns\TextColumn::make('frequency.title')->label(__('Frequency')),
                Tables\Columns\TextColumn::make('taskPriority.name')->label(__('Priority')),
                Tables\Columns\TextColumn::make('taskCategory.name')->label(__('Category')),
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
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }    
}
