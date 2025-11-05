<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrustBadgeResource\Pages;
use App\Filament\Resources\TrustBadgeResource\RelationManagers;
use App\Models\TrustBadge;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrustBadgeResource extends Resource
{
    protected static ?string $model = TrustBadge::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    protected static ?int $navigationSort = 8;

    public static function getNavigationLabel(): string
    {
        return __('filament.resources.trust_badge');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament.navigation.landing_page');
    }

    public static function getModelLabel(): string
    {
        return __('filament.resources.trust_badge');
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

                Forms\Components\Section::make('Badge Content')
                    ->schema([
                        Forms\Components\TextInput::make('icon')
                            ->label('FontAwesome Icon Class')
                            ->required()
                            ->maxLength(255)
                            ->default('fa-solid fa-shield-halved')
                            ->placeholder('fa-solid fa-shield-halved')
                            ->helperText('e.g., fa-solid fa-lock, fa-solid fa-award')
                            ->prefix('📦'),
                        Forms\Components\Textarea::make('text')
                            ->label('Badge Text')
                            ->required()
                            ->rows(2)
                            ->placeholder('Secure & Encrypted / ISO Certified / GDPR Compliant')
                            ->columnSpanFull(),
                    ])
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
                Tables\Columns\TextColumn::make('icon')
                    ->label('Icon')
                    ->searchable()
                    ->limit(20)
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('text')
                    ->label('Text')
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
            'index' => Pages\ListTrustBadges::route('/'),
            'create' => Pages\CreateTrustBadge::route('/create'),
            'edit' => Pages\EditTrustBadge::route('/{record}/edit'),
        ];
    }
}
