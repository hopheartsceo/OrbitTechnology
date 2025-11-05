<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactInfoResource\Pages;
use App\Filament\Resources\ContactInfoResource\RelationManagers;
use App\Models\ContactInfo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactInfoResource extends Resource
{
    protected static ?string $model = ContactInfo::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone';

    protected static ?int $navigationSort = 9;

    public static function getNavigationLabel(): string
    {
        return __('filament.resources.contact_info');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament.navigation.landing_page');
    }

    public static function getModelLabel(): string
    {
        return __('filament.resources.contact_info');
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
                        Forms\Components\Select::make('type')
                            ->label('Contact Type')
                            ->options([
                                'phone' => 'Phone',
                                'email' => 'Email',
                                'address' => 'Address',
                                'whatsapp' => 'WhatsApp',
                                'social' => 'Social Media',
                            ])
                            ->required()
                            ->reactive()
                            ->placeholder('Select type'),
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
                    ->columns(4)
                    ->collapsible(),

                Forms\Components\Section::make('Contact Details')
                    ->schema([
                        Forms\Components\TextInput::make('icon')
                            ->label('FontAwesome Icon Class')
                            ->required()
                            ->maxLength(255)
                            ->default('fa-solid fa-phone')
                            ->placeholder('fa-solid fa-phone')
                            ->helperText('e.g., fa-solid fa-envelope, fa-brands fa-whatsapp')
                            ->prefix('📦'),
                        Forms\Components\TextInput::make('title')
                            ->label('Title / Label')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Call Us / Email / Visit Us'),
                        Forms\Components\TextInput::make('value')
                            ->label('Display Value')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('+966 12 345 6789 / info@example.com')
                            ->helperText('The text shown to users'),
                        Forms\Components\TextInput::make('link')
                            ->label('Action Link (Optional)')
                            ->maxLength(255)
                            ->url()
                            ->placeholder('tel:+966123456789 / mailto:info@example.com')
                            ->helperText('URL for clickable action (tel:, mailto:, https://)'),
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
                Tables\Columns\BadgeColumn::make('type')
                    ->label('Type')
                    ->colors([
                        'primary' => 'phone',
                        'success' => 'email',
                        'warning' => 'address',
                        'info' => 'whatsapp',
                        'danger' => 'social',
                    ])
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('value')
                    ->label('Value')
                    ->searchable()
                    ->limit(30),
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
                Tables\Filters\SelectFilter::make('type')
                    ->label('Contact Type')
                    ->options([
                        'phone' => 'Phone',
                        'email' => 'Email',
                        'address' => 'Address',
                        'whatsapp' => 'WhatsApp',
                        'social' => 'Social Media',
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
            'index' => Pages\ListContactInfos::route('/'),
            'create' => Pages\CreateContactInfo::route('/create'),
            'edit' => Pages\EditContactInfo::route('/{record}/edit'),
        ];
    }
}
