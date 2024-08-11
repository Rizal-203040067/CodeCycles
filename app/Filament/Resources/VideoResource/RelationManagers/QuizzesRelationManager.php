<?php

namespace App\Filament\Resources\VideoResource\RelationManagers;

use App\Filament\Resources\VideoResource;
use App\Models\Quiz;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables;

class QuizzesRelationManager extends RelationManager
{
    protected static string $relationship = 'quizzes';

    protected static ?string $recordTitleAttribute = 'question';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('question')
                    ->required(),
                Forms\Components\Repeater::make('options')
                    ->schema([
                        Forms\Components\TextInput::make('option')
                            ->required(),
                    ])
                    ->minItems(2)
                    ->maxItems(5)
                    ->required(),
                Forms\Components\TextInput::make('correct_answer')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->label('Question'),
                Tables\Columns\TextColumn::make('correct_answer')
                    ->label('Correct Answer'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}