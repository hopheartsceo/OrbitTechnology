<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SystemSettingResource\Pages;
use App\Filament\Resources\SystemSettingResource\RelationManagers;
use App\Models\SystemSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SystemSettingResource extends Resource
{
    protected static ?string $model = SystemSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    public static function getNavigationLabel(): string
    {
        return __('filament.resources.system_setting');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament.navigation.settings');
    }

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('filament.sections.setting_info'))
                    ->schema([
                        Forms\Components\TextInput::make('key')
                            ->label(__('filament.system_setting.key'))
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText(__('filament.system_setting.key_helper'))
                            ->columnSpanFull(),

                        Forms\Components\Select::make('group')
                            ->label(__('filament.system_setting.group'))
                            ->options([
                                'general' => __('filament.system_setting.groups.general'),
                                'analytics' => __('filament.system_setting.groups.analytics'),
                                'social' => __('filament.system_setting.groups.social'),
                                'email' => __('filament.system_setting.groups.email'),
                                'api' => __('filament.system_setting.groups.api'),
                                'security' => __('filament.system_setting.groups.security'),
                            ])
                            ->required()
                            ->default('general')
                            ->columnSpan(1),

                        Forms\Components\Toggle::make('is_active')
                            ->label(__('filament.fields.is_active'))
                            ->default(true)
                            ->columnSpan(1),

                        Forms\Components\Textarea::make('description')
                            ->label(__('filament.fields.description'))
                            ->rows(2)
                            ->maxLength(500)
                            ->columnSpanFull(),

                        Forms\Components\KeyValue::make('value')
                            ->label(__('filament.system_setting.value'))
                            ->keyLabel(__('filament.system_setting.property'))
                            ->valueLabel(__('filament.fields.value'))
                            ->reorderable()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->label(__('filament.columns.key'))
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('bold'),

                Tables\Columns\BadgeColumn::make('group')
                    ->label(__('filament.system_setting.group'))
                    ->colors([
                        'primary' => 'general',
                        'success' => 'analytics',
                        'info' => 'social',
                        'warning' => 'email',
                        'danger' => 'api',
                        'secondary' => 'security',
                    ])
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->label(__('filament.fields.description'))
                    ->limit(50)
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label(__('filament.fields.status'))
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('filament.columns.last_updated'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('group')
                    ->options([
                        'general' => __('filament.system_setting.groups.general'),
                        'analytics' => __('filament.system_setting.groups.analytics'),
                        'social' => __('filament.system_setting.groups.social'),
                        'email' => __('filament.system_setting.groups.email'),
                        'api' => __('filament.system_setting.groups.api'),
                        'security' => __('filament.system_setting.groups.security'),
                    ]),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label(__('filament.filters.status'))
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
                ]),
            ])
            ->defaultSort('group', 'asc');
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
            'index' => Pages\ListSystemSettings::route('/'),
            'create' => Pages\CreateSystemSetting::route('/create'),
            'edit' => Pages\EditSystemSetting::route('/{record}/edit'),
        ];
    }
}
