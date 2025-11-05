<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatResource\Pages;
use App\Filament\Resources\StatResource\RelationManagers;
use App\Models\Stat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StatResource extends Resource
{
    protected static ?string $model = Stat::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?int $navigationSort = 6;

    public static function getNavigationLabel(): string
    {
        return __('filament.resources.stat');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament.navigation.landing_page');
    }

    public static function getModelLabel(): string
    {
        return __('filament.resources.stat');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\Select::make('locale')
                            ->label('Language')
                            ->options([
                                'en' => '🇬🇧 English',
                                'ar' => '🇸🇦 Arabic',
                            ])
                            ->required()
                            ->default('en'),
                        Forms\Components\TextInput::make('order')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->helperText('Lower numbers appear first'),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->inline(false),
                    ])
                    ->columns(3)
                    ->collapsible(),

                Forms\Components\Section::make('Statistic Content')
                    ->schema([
                        Forms\Components\TextInput::make('number')
                            ->label('Number / Value')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('500+ / 99.9% / 10K+')
                            ->helperText('Can include + or % symbols'),
                        Forms\Components\TextInput::make('label')
                            ->label('Label / Description')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Happy Customers / Uptime / Messages Sent'),
                    ])
                    ->columns(2)
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BadgeColumn::make('locale')
                    ->label('Lang')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'en' => '🇬🇧 EN',
                        'ar' => '🇸🇦 AR',
                        default => $state,
                    })
                    ->colors([
                        'primary' => 'en',
                        'success' => 'ar',
                    ])
                    ->sortable(),
                Tables\Columns\TextColumn::make('number')
                    ->label('Number')
                    ->searchable()
                    ->badge()
                    ->color('info')
                    ->size('lg'),
                Tables\Columns\TextColumn::make('label')
                    ->label('Label')
                    ->searchable()
                    ->limit(30)
                    ->sortable(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Order')
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->color('warning'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('locale')
                    ->label('Language')
                    ->options([
                        'en' => 'English',
                        'ar' => 'Arabic',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('activate')
                        ->label('Activate')
                        ->icon('heroicon-o-check-circle')
                        ->action(fn ($records) => $records->each->update(['is_active' => true]))
                        ->deselectRecordsAfterCompletion()
                        ->color('success'),
                    Tables\Actions\BulkAction::make('deactivate')
                        ->label('Deactivate')
                        ->icon('heroicon-o-x-circle')
                        ->action(fn ($records) => $records->each->update(['is_active' => false]))
                        ->deselectRecordsAfterCompletion()
                        ->color('danger'),
                ]),
            ])
            ->defaultSort('order', 'asc')
            ->reorderable('order');
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
            'index' => Pages\ListStats::route('/'),
            'create' => Pages\CreateStat::route('/create'),
            'edit' => Pages\EditStat::route('/{record}/edit'),
        ];
    }
}
