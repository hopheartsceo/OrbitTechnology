<?php

namespace App\Filament\Resources\PricingTierResource\Pages;

use App\Filament\Resources\PricingTierResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPricingTiers extends ListRecords
{
    protected static string $resource = PricingTierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
