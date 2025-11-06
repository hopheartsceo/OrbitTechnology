<?php

namespace App\Filament\Concerns;

use App\Services\ImageOptimizerService;
use Illuminate\Support\Facades\Storage;

trait OptimizesUploadedImages
{
    /**
     * Process uploaded image after save
     */
    protected function optimizeUploadedImage(string $path, array $options = []): ?string
    {
        try {
            $optimizer = app(ImageOptimizerService::class);

            // Default options
            $defaultOptions = [
                'disk' => 'public',
                'remove_background' => false,
                'quality' => 85,
                'maintain_ratio' => true,
            ];

            $options = array_merge($defaultOptions, $options);

            // Check if file exists
            if (!Storage::disk($options['disk'])->exists($path)) {
                return null;
            }

            // Process based on type
            if ($options['remove_background']) {
                $optimizedPath = $optimizer->removeBackground($path, $options);
            } else {
                $optimizedPath = $optimizer->optimizeImage($path, $options);
            }

            // Optionally replace original with optimized version
            if ($options['replace_original'] ?? false) {
                Storage::disk($options['disk'])->delete($path);
                Storage::disk($options['disk'])->move($optimizedPath, $path);
                return $path;
            }

            return $optimizedPath;

        } catch (\Exception $e) {
            // Log error but don't break the upload
            logger()->error('Image optimization failed: ' . $e->getMessage(), [
                'path' => $path,
                'options' => $options,
            ]);

            return null;
        }
    }

    /**
     * Process logo upload (remove background + create sizes)
     */
    protected function optimizeLogo(string $path, array $options = []): array
    {
        try {
            $optimizer = app(ImageOptimizerService::class);

            $defaultOptions = [
                'disk' => 'public',
                'tolerance' => 60,
            ];

            $options = array_merge($defaultOptions, $options);

            return $optimizer->processLogo($path, $options);

        } catch (\Exception $e) {
            logger()->error('Logo optimization failed: ' . $e->getMessage(), [
                'path' => $path,
            ]);

            return ['error' => $e->getMessage()];
        }
    }

    /**
     * Get optimized image path or fallback to original
     */
    protected function getOptimizedImagePath(string $originalPath, string $suffix = '_optimized'): string
    {
        $directory = dirname($originalPath);
        $filename = pathinfo($originalPath, PATHINFO_FILENAME);
        $extension = pathinfo($originalPath, PATHINFO_EXTENSION);

        $optimizedPath = $directory . '/' . $filename . $suffix . '.' . $extension;

        // Check if optimized version exists
        if (Storage::disk('public')->exists($optimizedPath)) {
            return $optimizedPath;
        }

        // Check for _nobg version
        $noBgPath = $directory . '/' . $filename . '_nobg.' . $extension;
        if (Storage::disk('public')->exists($noBgPath)) {
            return $noBgPath;
        }

        // Fallback to original
        return $originalPath;
    }
}
