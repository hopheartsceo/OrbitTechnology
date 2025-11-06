<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use App\Filament\Concerns\OptimizesUploadedImages;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditCustomer extends EditRecord
{
    use OptimizesUploadedImages;

    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('optimize_logo')
                ->label('Optimize Logo')
                ->icon('heroicon-o-sparkles')
                ->visible(fn () => $this->record->logo)
                ->action(function () {
                    try {
                        $optimizedPath = $this->optimizeUploadedImage($this->record->logo, [
                            'remove_background' => true,
                            'tolerance' => 60,
                            'quality' => 90,
                            'width' => 300,
                            'height' => 150,
                            'replace_original' => true,
                        ]);

                        if ($optimizedPath) {
                            Notification::make()
                                ->success()
                                ->title('Logo Optimized!')
                                ->body('Logo has been optimized with background removed.')
                                ->send();
                        }
                    } catch (\Exception $e) {
                        Notification::make()
                            ->danger()
                            ->title('Optimization Failed')
                            ->body($e->getMessage())
                            ->send();
                    }
                }),
        ];
    }

    protected function afterSave(): void
    {
        // Check if logo was changed
        if ($this->record->wasChanged('logo') && $this->record->logo) {
            try {
                $this->optimizeUploadedImage($this->record->logo, [
                    'remove_background' => true,
                    'tolerance' => 60,
                    'quality' => 90,
                    'width' => 300,
                    'height' => 150,
                    'replace_original' => true,
                ]);

                Notification::make()
                    ->success()
                    ->title('Logo Optimized')
                    ->body('New logo has been automatically optimized.')
                    ->send();
            } catch (\Exception $e) {
                // Silent fail - logo still uploaded
            }
        }
    }
}
