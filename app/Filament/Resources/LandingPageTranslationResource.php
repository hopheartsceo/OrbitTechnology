<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LandingPageTranslationResource\Pages;
use App\Filament\Resources\LandingPageTranslationResource\RelationManagers;
use App\Models\LandingPageTranslation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LandingPageTranslationResource extends Resource
{
    protected static ?string $model = LandingPageTranslation::class;

    protected static ?string $navigationIcon = 'heroicon-o-language';

    protected static ?int $navigationSort = 1;

    public static function getNavigationLabel(): string
    {
        return __('filament.resources.landing_page_translation');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament.navigation.landing_page');
    }

    public static function getModelLabel(): string
    {
        return __('filament.resources.landing_page_translation');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Language Configuration')
                    ->schema([
                        Forms\Components\Select::make('locale')
                            ->label('Language')
                            ->options([
                                'en' => '🇬🇧 English',
                                'ar' => '🇸🇦 Arabic',
                            ])
                            ->required()
                            ->default('en')
                            ->disabled(fn ($record) => $record !== null)
                            ->helperText('Cannot be changed after creation'),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Show this translation on the website'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Forms\Components\Section::make('Site Information')
                    ->schema([
                        Forms\Components\TextInput::make('site_title')
                            ->label('Site Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Orbit Technology'),
                        Forms\Components\Textarea::make('site_description')
                            ->label('Site Description')
                            ->rows(3)
                            ->placeholder('Your site description for SEO')
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->collapsible(),

                Forms\Components\Section::make('Navigation Menu')
                    ->schema([
                        Forms\Components\TextInput::make('nav_home')
                            ->label('Home')
                            ->required()
                            ->maxLength(255)
                            ->default('Home')
                            ->placeholder('Home'),
                        Forms\Components\TextInput::make('nav_services')
                            ->label('Services')
                            ->required()
                            ->maxLength(255)
                            ->default('Services')
                            ->placeholder('Services'),
                        Forms\Components\TextInput::make('nav_pricing')
                            ->label('Pricing')
                            ->required()
                            ->maxLength(255)
                            ->default('Pricing')
                            ->placeholder('Pricing'),
                        Forms\Components\TextInput::make('nav_contact')
                            ->label('Contact')
                            ->required()
                            ->maxLength(255)
                            ->default('Contact')
                            ->placeholder('Contact'),
                        Forms\Components\TextInput::make('nav_login')
                            ->label('Login')
                            ->required()
                            ->maxLength(255)
                            ->default('Login')
                            ->placeholder('Login'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Forms\Components\Section::make('Footer')
                    ->schema([
                        Forms\Components\TextInput::make('footer_copyright')
                            ->label('Copyright Text')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('© 2024 Orbit Technology. All rights reserved.'),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BadgeColumn::make('locale')
                    ->label('Language')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'en' => '🇬🇧 English',
                        'ar' => '🇸🇦 Arabic',
                        default => $state,
                    })
                    ->colors([
                        'primary' => 'en',
                        'success' => 'ar',
                    ])
                    ->sortable(),
                Tables\Columns\TextColumn::make('site_title')
                    ->label('Site Title')
                    ->searchable()
                    ->limit(30)
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('locale')
                    ->label('Language')
                    ->options([
                        'en' => 'English',
                        'ar' => 'Arabic',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status')
                    ->placeholder('All translations')
                    ->trueLabel('Active only')
                    ->falseLabel('Inactive only'),
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
            ->defaultSort('locale', 'asc');
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
            'index' => Pages\ListLandingPageTranslations::route('/'),
            'create' => Pages\CreateLandingPageTranslation::route('/create'),
            'edit' => Pages\EditLandingPageTranslation::route('/{record}/edit'),
        ];
    }
}
