<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrbitLandingResource\Pages;
use App\Models\OrbitLanding;
use Filament\Forms;
use Filament\Forms\Form as FormsForm;
use Filament\Resources\Resource;
use Filament\Tables\Table as TablesTable;
use Filament\Tables;

class OrbitLandingResource extends Resource
{
    protected static ?string $model = OrbitLanding::class;

    // 'collection' icon not available in this heroicons set; use 'rectangle-stack' instead
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Landing Pages';

    public static function form(FormsForm $form): FormsForm
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('locale')
                    ->required()
                    ->maxLength(5),

                Forms\Components\TextInput::make('hero_title')
                    ->label('Hero Title')
                    ->required()
                    ->maxLength(191),

                Forms\Components\RichEditor::make('hero_subtitle')
                    ->label('Hero Subtitle')
                    ->toolbarButtons(['bold','italic','link','bulletList','orderedList']),

                Forms\Components\RichEditor::make('about_text')
                    ->label('About / Brand Text')
                    ->toolbarButtons(['bold','italic','link','bulletList','orderedList']),

                Forms\Components\FileUpload::make('about_image')
                    ->image()
                    ->label('About Image')
                    ->directory('orbit-landing')
                    ->required(false),

                Forms\Components\Repeater::make('services')
                    ->schema([
                        Forms\Components\TextInput::make('title')->required(),
                        Forms\Components\RichEditor::make('description')->toolbarButtons(['bold','link','bulletList']),
                    ])
                    ->collapsed()
                    ->label('Services')
                    ->columns(1),

                Forms\Components\FileUpload::make('showcase_images')
                    ->image()
                    ->label('Showcase Images')
                    ->multiple()
                    ->directory('orbit-landing/showcase'),

                Forms\Components\FileUpload::make('clients')
                    ->image()
                    ->label('Client Logos')
                    ->multiple()
                    ->directory('orbit-landing/clients'),

                Forms\Components\TextInput::make('cta_title')->label('CTA Title'),
                Forms\Components\RichEditor::make('cta_subtitle')->label('CTA Subtitle'),
                Forms\Components\TextInput::make('cta_email')->label('CTA Email')->email(),
            ]);
    }

    public static function table(TablesTable $table): TablesTable
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('locale')->label('Locale')->sortable(),
                Tables\Columns\TextColumn::make('hero_title')->limit(50)->label('Hero Title'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Created'),
            ])
            ->filters([
                // add filters if needed
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrbitLandings::route('/'),
            'create' => Pages\CreateOrbitLanding::route('/create'),
            'edit' => Pages\EditOrbitLanding::route('/{record}/edit'),
        ];
    }
}
