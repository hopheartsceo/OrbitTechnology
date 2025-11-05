<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class TranslateFilamentResources extends Command
{
    protected $signature = 'filament:translate';
    protected $description = 'Add translations to Filament resources';

    public function handle()
    {
        $resources = [
            'LandingPageTranslationResource' => [
                'navigationLabel' => 'resources.landing_page_translation',
                'navigationGroup' => 'navigation.landing_page',
            ],
            'HeroSectionResource' => [
                'navigationLabel' => 'resources.hero_section',
                'navigationGroup' => 'navigation.landing_page',
            ],
            'FeatureResource' => [
                'navigationLabel' => 'resources.feature',
                'navigationGroup' => 'navigation.landing_page',
            ],
            'ServiceResource' => [
                'navigationLabel' => 'resources.service',
                'navigationGroup' => 'navigation.landing_page',
            ],
            'PricingTierResource' => [
                'navigationLabel' => 'resources.pricing_tier',
                'navigationGroup' => 'navigation.landing_page',
            ],
            'StatResource' => [
                'navigationLabel' => 'resources.stat',
                'navigationGroup' => 'navigation.landing_page',
            ],
            'SectorResource' => [
                'navigationLabel' => 'resources.sector',
                'navigationGroup' => 'navigation.landing_page',
            ],
            'TrustBadgeResource' => [
                'navigationLabel' => 'resources.trust_badge',
                'navigationGroup' => 'navigation.landing_page',
            ],
            'ContactInfoResource' => [
                'navigationLabel' => 'resources.contact_info',
                'navigationGroup' => 'navigation.landing_page',
            ],
        ];

        foreach ($resources as $resource => $translations) {
            $this->updateResource($resource, $translations);
        }

        $this->info('✅ All Filament resources have been translated!');
        return 0;
    }

    private function updateResource($resourceName, $translations)
    {
        $path = app_path("Filament/Resources/{$resourceName}.php");
        
        if (!File::exists($path)) {
            $this->warn("⚠️  File not found: {$resourceName}");
            return;
        }

        $content = File::get($path);

        // Check if already translated
        if (strpos($content, 'getNavigationLabel()') !== false) {
            $this->info("⏭️  Already translated: {$resourceName}");
            return;
        }

        // Find and replace the navigation label pattern
        $pattern = "/(protected static \?string \$navigationLabel = '[^']+';)/";
        $replacement = "public static function getNavigationLabel(): string\n    {\n        return __('filament.{$translations['navigationLabel']}');\n    }";
        
        $content = preg_replace($pattern, $replacement, $content);

        // Find and replace the navigation group pattern
        $pattern = "/(protected static \?string \$navigationGroup = '[^']+';)/";
        $replacement = "public static function getNavigationGroup(): ?string\n    {\n        return __('filament.{$translations['navigationGroup']}');\n    }";
        
        $content = preg_replace($pattern, $replacement, $content);

        File::put($path, $content);
        $this->info("✅ Translated: {$resourceName}");
    }
}
