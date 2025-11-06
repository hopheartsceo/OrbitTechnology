<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ImageOptimizerService;
use Illuminate\Support\Facades\Storage;

class OptimizeImagesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:optimize
                            {path? : The path to process (file or directory)}
                            {--remove-bg : Remove background from images}
                            {--logo : Process as logo (remove bg + create sizes)}
                            {--quality=85 : JPEG quality (0-100)}
                            {--width= : Maximum width}
                            {--height= : Maximum height}
                            {--tolerance=50 : Background removal tolerance (0-255)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize images: remove backgrounds, resize, compress';

    protected $optimizer;

    public function __construct(ImageOptimizerService $optimizer)
    {
        parent::__construct();
        $this->optimizer = $optimizer;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = $this->argument('path');

        if (!$path) {
            $this->showHelp();
            return 1;
        }

        $this->info("🎨 Starting image optimization...\n");

        try {
            // Check if path exists
            if (!Storage::disk('public')->exists($path)) {
                $this->error("Path not found: {$path}");
                return 1;
            }

            // Check if it's a file or directory
            $fullPath = Storage::disk('public')->path($path);
            $isFile = is_file($fullPath);

            if ($isFile) {
                $this->processFile($path);
            } else {
                $this->processDirectory($path);
            }

            $this->info("\n✅ Image optimization completed!");
            return 0;

        } catch (\Exception $e) {
            $this->error("Error: " . $e->getMessage());
            return 1;
        }
    }

    protected function processFile(string $path)
    {
        $this->line("Processing: {$path}");

        try {
            if ($this->option('logo')) {
                // Process as logo
                $results = $this->optimizer->processLogo($path, [
                    'tolerance' => (int)$this->option('tolerance'),
                ]);

                $this->info("  ✓ Logo processed successfully!");
                $this->table(
                    ['Size', 'Path'],
                    collect($results)->map(fn($path, $size) => [$size, $path])
                );

            } elseif ($this->option('remove-bg')) {
                // Remove background only
                $result = $this->optimizer->removeBackground($path, [
                    'tolerance' => (int)$this->option('tolerance'),
                ]);

                $this->info("  ✓ Background removed: {$result}");

            } else {
                // Optimize image
                $options = [
                    'quality' => (int)$this->option('quality'),
                ];

                if ($this->option('width')) {
                    $options['width'] = (int)$this->option('width');
                }
                if ($this->option('height')) {
                    $options['height'] = (int)$this->option('height');
                }

                $result = $this->optimizer->optimizeImage($path, $options);
                $this->info("  ✓ Image optimized: {$result}");
            }

        } catch (\Exception $e) {
            $this->error("  ✗ Failed: " . $e->getMessage());
        }
    }

    protected function processDirectory(string $directory)
    {
        $this->line("Processing directory: {$directory}\n");

        $options = [
            'remove_background' => $this->option('remove-bg'),
            'quality' => (int)$this->option('quality'),
        ];

        if ($this->option('width')) {
            $options['width'] = (int)$this->option('width');
        }
        if ($this->option('height')) {
            $options['height'] = (int)$this->option('height');
        }

        $results = $this->optimizer->batchProcess($directory, $options);

        // Display results
        $this->info("Processed: " . count($results['processed']));
        $this->warn("Skipped: " . count($results['skipped']));
        $this->error("Failed: " . count($results['failed']));

        if (count($results['processed']) > 0) {
            $this->line("\n📁 Processed Files:");
            $this->table(
                ['Original', 'Processed'],
                collect($results['processed'])->map(fn($item) => [$item['original'], $item['processed']])
            );
        }

        if (count($results['failed']) > 0) {
            $this->line("\n❌ Failed Files:");
            $this->table(
                ['File', 'Error'],
                collect($results['failed'])->map(fn($item) => [$item['file'], $item['error']])
            );
        }
    }

    protected function showHelp()
    {
        $this->line("
🎨 <fg=cyan>Image Optimization Tool</>

<fg=yellow>Usage Examples:</>

  # Remove background from logo
  php artisan images:optimize logo.png --remove-bg

  # Process logo (remove bg + create multiple sizes)
  php artisan images:optimize logo.png --logo

  # Optimize image with specific dimensions
  php artisan images:optimize hero.jpg --width=1920 --height=1080 --quality=90

  # Batch process all images in directory
  php artisan images:optimize customers --remove-bg

  # Process directory with custom settings
  php artisan images:optimize images/products --width=800 --quality=85

<fg=yellow>Options:</>
  --remove-bg       Remove background from images
  --logo            Process as logo (remove bg + create sizes)
  --quality=85      JPEG quality (0-100)
  --width=          Maximum width in pixels
  --height=         Maximum height in pixels
  --tolerance=50    Background removal sensitivity (0-255)
        ");
    }
}

