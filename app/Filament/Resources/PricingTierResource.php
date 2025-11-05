<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PricingTierResource\Pages;
use App\Filament\Resources\PricingTierResource\RelationManagers;
use App\Models\PricingTier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PricingTierResource extends Resource
{
    protected static ?string $model = PricingTier::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?int $navigationSort = 5;

    public static function getNavigationLabel(): string
    {
        return __('filament.resources.pricing_tier');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament.navigation.landing_page');
    }

    public static function getModelLabel(): string
    {
        return __('filament.resources.pricing_tier');
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

                Forms\Components\Section::make('Pricing Details')
                    ->schema([
                        Forms\Components\TextInput::make('tier_name')
                            ->label('Plan Name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Basic / Pro / Enterprise'),
                        Forms\Components\TextInput::make('price')
                            ->label('Price')
                            ->required()
                            ->numeric()
                            ->prefix('$')
                            ->step('0.01')
                            ->minValue(0)
                            ->placeholder('0.00'),
                        Forms\Components\TextInput::make('per_message_text')
                            ->label('Billing Period Text')
                            ->required()
                            ->maxLength(255)
                            ->default('per message')
                            ->placeholder('per message / per month / per user'),
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured Plan')
                            ->helperText('Highlight this plan (best value badge)')
                            ->default(false)
                            ->inline(false),
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
                Tables\Columns\TextColumn::make('tier_name')
                    ->label('Plan Name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('price')
                    ->label('Price')
                    ->money('USD')
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('is_featured')
                    ->label('Featured')
                    ->formatStateUsing(fn (bool $state): string => $state ? '⭐ Featured' : 'Regular')
                    ->colors([
                        'warning' => true,
                        'secondary' => false,
                    ]),
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
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured Plans')
                    ->placeholder('All plans')
                    ->trueLabel('Featured only')
                    ->falseLabel('Regular only'),
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
            'index' => Pages\ListPricingTiers::route('/'),
            'create' => Pages\CreatePricingTier::route('/create'),
            'edit' => Pages\EditPricingTier::route('/{record}/edit'),
        ];
    }
}
