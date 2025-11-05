<?php

namespace App\Filament\Resources\LandingPageTranslationResource\Pages;

use App\Filament\Resources\LandingPageTranslationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLandingPageTranslation extends EditRecord
{
    protected static string $resource = LandingPageTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
