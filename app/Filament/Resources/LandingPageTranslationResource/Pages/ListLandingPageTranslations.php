<?php

namespace App\Filament\Resources\LandingPageTranslationResource\Pages;

use App\Filament\Resources\LandingPageTranslationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLandingPageTranslations extends ListRecords
{
    protected static string $resource = LandingPageTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
