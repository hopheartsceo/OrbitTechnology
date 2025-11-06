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

    protected static ?int $navigationSort = 1;

    public static function getNavigationLabel(): string
    {
        return __('filament.resources.hero_sections');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament.navigation.content');
    }

    public static function getModelLabel(): string
    {
        return __('filament.resources.hero_section');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.resources.hero_sections');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('filament.sections.basic_info'))
                    ->schema([
                        Forms\Components\Select::make('locale')
                            ->label(__('filament.fields.locale'))
                            ->options([
                                'en' => __('filament.fields.locale_en'),
                                'ar' => __('filament.fields.locale_ar'),
                            ])
                            ->required()
                            ->default('en')
                            ->helperText(__('filament.helpers.locale'))
                            ->native(false),
                        Forms\Components\TextInput::make('order')
                            ->label(__('filament.fields.order'))
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->helperText(__('filament.helpers.order'))
                            ->required(),
                        Forms\Components\Toggle::make('is_active')
                            ->label(__('filament.fields.is_active'))
                            ->default(true)
                            ->helperText(__('filament.helpers.is_active'))
                            ->inline(false),
                    ])
                    ->columns(3)
                    ->collapsible(),

                Forms\Components\Section::make(__('filament.sections.hero_content'))
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label(__('filament.labels.headline'))
                            ->required()
                            ->maxLength(255)
                            ->placeholder(__('filament.placeholders.title'))
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('subtitle')
                            ->label(__('filament.labels.subheadline'))
                            ->required()
                            ->rows(3)
                            ->placeholder(__('filament.placeholders.subtitle'))
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Forms\Components\Section::make(__('filament.sections.cta_buttons'))
                    ->schema([
                        Forms\Components\TextInput::make('primary_button_text')
                            ->label(__('filament.labels.primary_button') . ' - ' . __('filament.labels.button_text'))
                            ->required()
                            ->maxLength(255)
                            ->default('Start Now')
                            ->placeholder(__('filament.placeholders.text')),
                        Forms\Components\TextInput::make('primary_button_url')
                            ->label(__('filament.labels.primary_button') . ' - ' . __('filament.labels.button_url'))
                            ->maxLength(255)
                            ->placeholder(__('filament.placeholders.anchor'))
                            ->helperText(__('filament.helpers.url_format')),
                        Forms\Components\TextInput::make('secondary_button_text')
                            ->label(__('filament.labels.secondary_button') . ' - ' . __('filament.labels.button_text'))
                            ->maxLength(255)
                            ->placeholder(__('filament.placeholders.text')),
                        Forms\Components\TextInput::make('secondary_button_url')
                            ->label(__('filament.labels.secondary_button') . ' - ' . __('filament.labels.button_url'))
                            ->maxLength(255)
                            ->placeholder(__('filament.placeholders.anchor'))
                            ->helperText(__('filament.helpers.url_format')),
                    ])
                    ->columns(2)
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->label(__('filament.fields.order'))
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->color('warning')
                    ->alignCenter(),
                Tables\Columns\BadgeColumn::make('locale')
                    ->label(__('filament.fields.locale'))
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'en' => '🇬🇧 EN',
                        'ar' => '🇸🇦 AR',
                        default => $state,
                    })
                    ->colors([
                        'primary' => 'en',
                        'success' => 'ar',
                    ])
                    ->sortable()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('title')
                    ->label(__('filament.labels.headline'))
                    ->searchable()
                    ->limit(50)
                    ->sortable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('subtitle')
                    ->label(__('filament.labels.subheadline'))
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label(__('filament.fields.is_active'))
                    ->boolean()
                    ->sortable()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('filament.labels.last_updated'))
                    ->dateTime('M d, Y H:i')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('locale')
                    ->label(__('filament.fields.locale'))
                    ->options([
                        'en' => __('filament.languages.en'),
                        'ar' => __('filament.languages.ar'),
                    ])
                    ->native(false),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label(__('filament.labels.active_status'))
                    ->placeholder(__('filament.filters.all_settings'))
                    ->trueLabel(__('filament.filters.active_only'))
                    ->falseLabel(__('filament.filters.inactive_only')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('activate')
                        ->label(__('filament.actions.activate'))
                        ->icon('heroicon-o-check-circle')
                        ->action(fn ($records) => $records->each->update(['is_active' => true]))
                        ->deselectRecordsAfterCompletion()
                        ->color('success'),
                    Tables\Actions\BulkAction::make('deactivate')
                        ->label(__('filament.actions.deactivate'))
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
