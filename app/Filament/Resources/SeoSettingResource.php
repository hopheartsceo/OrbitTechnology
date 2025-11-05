<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeoSettingResource\Pages;
use App\Filament\Resources\SeoSettingResource\RelationManagers;
use App\Models\SeoSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeoSettingResource extends Resource
{
    protected static ?string $model = SeoSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-magnifying-glass-circle';

    public static function getNavigationLabel(): string
    {
        return __('filament.resources.seo_setting');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament.navigation.settings');
    }

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('filament.sections.page_info'))
                    ->schema([
                        Forms\Components\Select::make('locale')
                            ->label(__('filament.fields.locale'))
                            ->options([
                                'en' => __('filament.languages.en'),
                                'ar' => __('filament.languages.ar'),
                            ])
                            ->required()
                            ->default('en')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('page')
                            ->label(__('filament.seo.page'))
                            ->required()
                            ->default('landing')
                            ->maxLength(255)
                            ->helperText(__('filament.seo.page_helper'))
                            ->columnSpan(1),

                        Forms\Components\Toggle::make('is_active')
                            ->label(__('filament.fields.is_active'))
                            ->default(true)
                            ->columnSpan(1),
                    ])
                    ->columns(3),

                Forms\Components\Tabs::make(__('filament.sections.seo_content'))
                    ->tabs([
                        Forms\Components\Tabs\Tab::make(__('filament.tabs.meta_tags'))
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\TextInput::make('meta_title')
                                    ->label('Meta Title')
                                    ->maxLength(120)
                                    ->helperText('Recommended: 50-60 characters')
                                    ->columnSpanFull(),

                                Forms\Components\Textarea::make('meta_description')
                                    ->label('Meta Description')
                                    ->rows(3)
                                    ->maxLength(160)
                                    ->helperText('Recommended: 150-160 characters')
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('meta_keywords')
                                    ->label('Meta Keywords')
                                    ->helperText('Comma-separated keywords')
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('canonical_url')
                                    ->label('Canonical URL')
                                    ->url()
                                    ->columnSpanFull(),

                                Forms\Components\Select::make('robots')
                                    ->label('Robots')
                                    ->options([
                                        'index, follow' => 'Index, Follow',
                                        'noindex, follow' => 'No Index, Follow',
                                        'index, nofollow' => 'Index, No Follow',
                                        'noindex, nofollow' => 'No Index, No Follow',
                                    ])
                                    ->default('index, follow')
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Open Graph')
                            ->icon('heroicon-o-share')
                            ->schema([
                                Forms\Components\TextInput::make('og_title')
                                    ->label('OG Title')
                                    ->maxLength(255)
                                    ->helperText('Title for Facebook/LinkedIn sharing')
                                    ->columnSpanFull(),

                                Forms\Components\Textarea::make('og_description')
                                    ->label('OG Description')
                                    ->rows(3)
                                    ->helperText('Description for social media sharing')
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('og_image')
                                    ->label('OG Image URL')
                                    ->url()
                                    ->helperText('Recommended: 1200x630px')
                                    ->columnSpanFull(),

                                Forms\Components\Select::make('og_type')
                                    ->label('OG Type')
                                    ->options([
                                        'website' => 'Website',
                                        'article' => 'Article',
                                        'product' => 'Product',
                                    ])
                                    ->default('website')
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Twitter Card')
                            ->icon('heroicon-o-at-symbol')
                            ->schema([
                                Forms\Components\Select::make('twitter_card')
                                    ->label('Card Type')
                                    ->options([
                                        'summary' => 'Summary',
                                        'summary_large_image' => 'Summary Large Image',
                                        'app' => 'App',
                                        'player' => 'Player',
                                    ])
                                    ->default('summary_large_image')
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('twitter_site')
                                    ->label('Twitter Site')
                                    ->helperText('Your Twitter username (e.g., @username)')
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('twitter_title')
                                    ->label('Twitter Title')
                                    ->maxLength(255)
                                    ->columnSpanFull(),

                                Forms\Components\Textarea::make('twitter_description')
                                    ->label('Twitter Description')
                                    ->rows(3)
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('twitter_image')
                                    ->label('Twitter Image URL')
                                    ->url()
                                    ->helperText('Recommended: 1200x600px')
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Structured Data')
                            ->icon('heroicon-o-code-bracket')
                            ->schema([
                                Forms\Components\Textarea::make('structured_data')
                                    ->label('JSON-LD Structured Data')
                                    ->rows(15)
                                    ->helperText('Enter valid JSON-LD schema (e.g., Organization, WebSite, LocalBusiness)')
                                    ->columnSpanFull()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        if (!empty($state)) {
                                            json_decode($state);
                                            if (json_last_error() !== JSON_ERROR_NONE) {
                                                $set('structured_data', $state);
                                            }
                                        }
                                    }),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BadgeColumn::make('locale')
                    ->label('Language')
                    ->colors([
                        'primary' => 'en',
                        'success' => 'ar',
                    ])
                    ->formatStateUsing(fn (string $state): string => strtoupper($state))
                    ->sortable(),

                Tables\Columns\TextColumn::make('page')
                    ->label('Page')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('meta_title')
                    ->label('Meta Title')
                    ->limit(40)
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('locale')
                    ->options([
                        'en' => 'English',
                        'ar' => 'Arabic',
                    ]),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status')
                    ->placeholder('All settings')
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
            'index' => Pages\ListSeoSettings::route('/'),
            'create' => Pages\CreateSeoSetting::route('/create'),
            'edit' => Pages\EditSeoSetting::route('/{record}/edit'),
        ];
    }
}
