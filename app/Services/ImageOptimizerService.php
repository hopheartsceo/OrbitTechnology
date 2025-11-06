<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageOptimizerService
{
    /**
     * Remove background from image and optimize
     */
    public function removeBackground(string $inputPath, array $options = []): string
    {
        $disk = $options['disk'] ?? 'public';
        $fullPath = Storage::disk($disk)->path($inputPath);
        
        if (!file_exists($fullPath)) {
            throw new \Exception("Image not found: {$inputPath}");
        }

        // Get image type
        $imageInfo = getimagesize($fullPath);
        $mimeType = $imageInfo['mime'];
        
        // Load image based on type
        switch ($mimeType) {
            case 'image/jpeg':
                $sourceImage = imagecreatefromjpeg($fullPath);
                break;
            case 'image/png':
                $sourceImage = imagecreatefrompng($fullPath);
                break;
            case 'image/gif':
                $sourceImage = imagecreatefromgif($fullPath);
                break;
            default:
                throw new \Exception("Unsupported image type: {$mimeType}");
        }
        
        $width = imagesx($sourceImage);
        $height = imagesy($sourceImage);
        
        // Create new transparent image
        $newImage = imagecreatetruecolor($width, $height);
        
        // Enable alpha blending and save alpha channel
        imagealphablending($newImage, false);
        imagesavealpha($newImage, true);
        
        // Fill with transparency
        $transparent = imagecolorallocatealpha($newImage, 0, 0, 0, 127);
        imagefill($newImage, 0, 0, $transparent);
        
        // Get background color from corner (top-left)
        $bgColor = imagecolorat($sourceImage, 0, 0);
        $bgR = ($bgColor >> 16) & 0xFF;
        $bgG = ($bgColor >> 8) & 0xFF;
        $bgB = $bgColor & 0xFF;
        
        $tolerance = $options['tolerance'] ?? 50;
        
        // Process each pixel
        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                $rgb = imagecolorat($sourceImage, $x, $y);
                $r = ($rgb >> 16) & 0xFF;
                $g = ($rgb >> 8) & 0xFF;
                $b = $rgb & 0xFF;
                $alpha = ($rgb >> 24) & 0x7F;
                
                // Calculate color distance from background
                $distance = sqrt(
                    pow($r - $bgR, 2) +
                    pow($g - $bgG, 2) +
                    pow($b - $bgB, 2)
                );
                
                // If pixel is similar to background, make it transparent
                if ($distance < $tolerance) {
                    $newAlpha = 127; // Fully transparent
                } else {
                    $newAlpha = $alpha;
                }
                
                $newColor = imagecolorallocatealpha($newImage, $r, $g, $b, $newAlpha);
                imagesetpixel($newImage, $x, $y, $newColor);
            }
        }
        
        // Generate output path
        $directory = dirname($inputPath);
        $filename = pathinfo($inputPath, PATHINFO_FILENAME);
        $outputPath = $directory . '/' . $filename . '_nobg.png';
        $outputFullPath = Storage::disk($disk)->path($outputPath);
        
        // Save as PNG with transparency
        imagepng($newImage, $outputFullPath, 9); // 9 = max compression
        
        // Clean up
        imagedestroy($sourceImage);
        imagedestroy($newImage);
        
        return $outputPath;
    }

    /**
     * Optimize and resize image
     */
    public function optimizeImage(string $inputPath, array $options = []): string
    {
        $disk = $options['disk'] ?? 'public';
        $fullPath = Storage::disk($disk)->path($inputPath);
        
        if (!file_exists($fullPath)) {
            throw new \Exception("Image not found: {$inputPath}");
        }

        $imageInfo = getimagesize($fullPath);
        $mimeType = $imageInfo['mime'];
        $originalWidth = $imageInfo[0];
        $originalHeight = $imageInfo[1];
        
        // Load source image
        switch ($mimeType) {
            case 'image/jpeg':
                $sourceImage = imagecreatefromjpeg($fullPath);
                break;
            case 'image/png':
                $sourceImage = imagecreatefrompng($fullPath);
                break;
            case 'image/gif':
                $sourceImage = imagecreatefromgif($fullPath);
                break;
            default:
                throw new \Exception("Unsupported image type: {$mimeType}");
        }
        
        // Calculate new dimensions
        $maxWidth = $options['width'] ?? $originalWidth;
        $maxHeight = $options['height'] ?? $originalHeight;
        $maintainRatio = $options['maintain_ratio'] ?? true;
        
        if ($maintainRatio) {
            $ratio = min($maxWidth / $originalWidth, $maxHeight / $originalHeight);
            $newWidth = (int)($originalWidth * $ratio);
            $newHeight = (int)($originalHeight * $ratio);
        } else {
            $newWidth = $maxWidth;
            $newHeight = $maxHeight;
        }
        
        // Create new image
        $newImage = imagecreatetruecolor($newWidth, $newHeight);
        
        // Preserve transparency for PNG/GIF
        if ($mimeType === 'image/png' || $mimeType === 'image/gif') {
            imagealphablending($newImage, false);
            imagesavealpha($newImage, true);
            $transparent = imagecolorallocatealpha($newImage, 0, 0, 0, 127);
            imagefill($newImage, 0, 0, $transparent);
        }
        
        // Resize
        imagecopyresampled(
            $newImage, $sourceImage,
            0, 0, 0, 0,
            $newWidth, $newHeight,
            $originalWidth, $originalHeight
        );
        
        // Generate output path
        $directory = dirname($inputPath);
        $filename = pathinfo($inputPath, PATHINFO_FILENAME);
        $format = $options['format'] ?? ($mimeType === 'image/png' ? 'png' : 'jpg');
        $outputPath = $directory . '/' . $filename . '_optimized.' . $format;
        $outputFullPath = Storage::disk($disk)->path($outputPath);
        
        // Save optimized image
        $quality = $options['quality'] ?? 85;
        
        if ($format === 'png') {
            imagepng($newImage, $outputFullPath, (int)(9 - ($quality / 10)));
        } else {
            imagejpeg($newImage, $outputFullPath, $quality);
        }
        
        // Clean up
        imagedestroy($sourceImage);
        imagedestroy($newImage);
        
        return $outputPath;
    }

    /**
     * Process logo: remove background and create multiple sizes
     */
    public function processLogo(string $inputPath, array $options = []): array
    {
        $disk = $options['disk'] ?? 'public';
        
        // First, remove background
        $noBgPath = $this->removeBackground($inputPath, [
            'disk' => $disk,
            'tolerance' => $options['tolerance'] ?? 50,
        ]);
        
        $results = ['original' => $noBgPath];
        
        // Create standard logo sizes
        $sizes = [
            'navbar' => ['width' => 200, 'height' => 100],
            'footer' => ['width' => 150, 'height' => 75],
            'favicon' => ['width' => 64, 'height' => 64],
            'og_image' => ['width' => 1200, 'height' => 630],
        ];
        
        foreach ($sizes as $name => $dimensions) {
            $optimized = $this->optimizeImage($noBgPath, [
                'width' => $dimensions['width'],
                'height' => $dimensions['height'],
                'maintain_ratio' => true,
                'format' => 'png',
                'quality' => 90,
                'disk' => $disk,
            ]);
            
            $results[$name] = $optimized;
        }
        
        return $results;
    }

    /**
     * Batch process all images in a directory
     */
    public function batchProcess(string $directory, array $options = []): array
    {
        $disk = $options['disk'] ?? 'public';
        $files = Storage::disk($disk)->files($directory);
        
        $results = [
            'processed' => [],
            'failed' => [],
            'skipped' => [],
        ];
        
        foreach ($files as $file) {
            // Skip non-images
            if (!$this->isImage($file)) {
                $results['skipped'][] = $file;
                continue;
            }
            
            // Skip already processed
            if (str_contains($file, '_nobg') || str_contains($file, '_optimized')) {
                $results['skipped'][] = $file;
                continue;
            }
            
            try {
                if ($options['remove_background'] ?? false) {
                    $processed = $this->removeBackground($file, ['disk' => $disk]);
                } else {
                    $processed = $this->optimizeImage($file, array_merge($options, ['disk' => $disk]));
                }
                
                $results['processed'][] = [
                    'original' => $file,
                    'processed' => $processed,
                ];
            } catch (\Exception $e) {
                $results['failed'][] = [
                    'file' => $file,
                    'error' => $e->getMessage(),
                ];
            }
        }
        
        return $results;
    }

    /**
     * Check if file is an image
     */
    protected function isImage(string $path): bool
    {
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        return in_array($extension, ['jpg', 'jpeg', 'png', 'gif']);
    }
}
