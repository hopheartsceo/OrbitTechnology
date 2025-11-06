<?php

namespace App\Filament\Resources\LogoIdentityResource\Pages;

use App\Filament\Resources\LogoIdentityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLogoIdentities extends ListRecords
{
    protected static string $resource = LogoIdentityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
