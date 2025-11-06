<?php

namespace App\Filament\Resources\MissionVisionResource\Pages;

use App\Filament\Resources\MissionVisionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMissionVisions extends ListRecords
{
    protected static string $resource = MissionVisionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
