<?php

namespace App\Filament\Resources\TrustBadgeResource\Pages;

use App\Filament\Resources\TrustBadgeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrustBadges extends ListRecords
{
    protected static string $resource = TrustBadgeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
