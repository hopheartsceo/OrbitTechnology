<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MissionVisionResource\Pages;
use App\Filament\Resources\MissionVisionResource\RelationManagers;
use App\Models\MissionVision;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MissionVisionResource extends Resource
{
    protected static ?string $model = MissionVision::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('locale')
                    ->required()
                    ->maxLength(2),
                Forms\Components\TextInput::make('section_title')
                    ->maxLength(255),
                Forms\Components\TextInput::make('vision_title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('vision_text')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('mission_title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('mission_text')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('locale')
                    ->searchable(),
                Tables\Columns\TextColumn::make('section_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vision_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mission_title')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListMissionVisions::route('/'),
            'create' => Pages\CreateMissionVision::route('/create'),
            'edit' => Pages\EditMissionVision::route('/{record}/edit'),
        ];
    }
}
