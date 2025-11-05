<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSectionResource\Pages;
use App\Filament\Resources\HeroSectionResource\RelationManagers;
use App\Models\HeroSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeroSectionResource extends Resource
{
    protected static ?string $model = HeroSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?int $navigationSort = 2;

    public static function getNavigationLabel(): string
    {
        return __('filament.resources.hero_section');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament.navigation.landing_page');
    }

    public static function getModelLabel(): string
    {
        return __('filament.resources.hero_section');
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
                            ->helperText('Show this hero section'),
                    ])
                    ->columns(3)
                    ->collapsible(),

                Forms\Components\Section::make('Hero Content')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Headline')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Transform Your Business with AI'),
                        Forms\Components\Textarea::make('subtitle')
                            ->label('Subheadline')
                            ->required()
                            ->rows(3)
                            ->placeholder('Discover how our solutions can help you grow')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Forms\Components\Section::make('Call-to-Action Buttons')
                    ->schema([
                        Forms\Components\TextInput::make('primary_button_text')
                            ->label('Primary Button Text')
                            ->required()
                            ->maxLength(255)
                            ->default('Start Now')
                            ->placeholder('Get Started'),
                        Forms\Components\TextInput::make('primary_button_url')
                            ->label('Primary Button URL')
                            ->maxLength(255)
                            ->placeholder('#contact')
                            ->helperText('Link or anchor (e.g., #contact)'),
                        Forms\Components\TextInput::make('secondary_button_text')
                            ->label('Secondary Button Text')
                            ->required()
                            ->maxLength(255)
                            ->default('View Pricing')
                            ->placeholder('Learn More'),
                        Forms\Components\TextInput::make('secondary_button_url')
                            ->label('Secondary Button URL')
                            ->required()
                            ->maxLength(255)
                            ->default('#pricing')
                            ->placeholder('#pricing'),
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
                    ->label('Language')
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
                Tables\Columns\TextColumn::make('title')
                    ->label('Headline')
                    ->searchable()
                    ->limit(40)
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
            'index' => Pages\ListHeroSections::route('/'),
            'create' => Pages\CreateHeroSection::route('/create'),
            'edit' => Pages\EditHeroSection::route('/{record}/edit'),
        ];
    }
}
