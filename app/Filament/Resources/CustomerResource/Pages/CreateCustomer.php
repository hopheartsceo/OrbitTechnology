<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use App\Filament\Concerns\OptimizesUploadedImages;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateCustomer extends CreateRecord
{
    use OptimizesUploadedImages;

    protected static string $resource = CustomerResource::class;

    protected function afterCreate(): void
    {
        // Optimize logo if uploaded
        if ($this->record->logo) {
            try {
                $optimizedPath = $this->optimizeUploadedImage($this->record->logo, [
                    'remove_background' => true,
                    'tolerance' => 60,
                    'quality' => 90,
                    'width' => 300,
                    'height' => 150,
                    'replace_original' => true, // Replace with optimized version
                ]);

                if ($optimizedPath) {
                    Notification::make()
                        ->success()
                        ->title('Logo Optimized')
                        ->body('Customer logo has been automatically optimized and background removed.')
                        ->send();
                }
            } catch (\Exception $e) {
                Notification::make()
                    ->warning()
                    ->title('Optimization Note')
                    ->body('Logo uploaded but optimization failed. You can optimize it manually later.')
                    ->send();
            }
        }
    }
}
