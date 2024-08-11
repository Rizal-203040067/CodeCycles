<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuizResource\Pages;
use App\Models\Quiz;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class QuizResource extends Resource
{
    protected static ?string $model = Quiz::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('video_id')
                    ->relationship('video', 'title')
                    ->required()
                    ->label('Video'),
                Forms\Components\TextInput::make('question')
                    ->required()
                    ->label('Question'),
                Forms\Components\TextInput::make('correct_answer')
                    ->required()
                    ->label('Correct Answer'),
                Forms\Components\Repeater::make('options')
                    ->relationship('options')
                    ->schema([
                        Forms\Components\TextInput::make('option')
                            ->required()
                            ->label('Option'),
                    ])
                    ->label('Quiz Options')
                    ->columns(1)
                    ->addActionLabel('Add Option')    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('question')->label('Question'),
                TextColumn::make('correct_answer')->label('Correct Answer'),
                TextColumn::make('video.title')->label('Video'),
            ])
            ->filters([])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuizzes::route('/'),
            'create' => Pages\CreateQuiz::route('/create'),
            'edit' => Pages\EditQuiz::route('/{record}/edit'),
        ];
    }
}
