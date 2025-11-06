<?php
/**
 * Placeholder Image Generator for ORBIT Landing Page
 * Run this script to generate temporary placeholder images
 *
 * Usage: php generate-placeholders.php
 */

// Image specifications
$images = [
    // About section
    [
        'filename' => 'about-orbit.jpg',
        'width' => 1000,
        'height' => 1000,
        'text' => 'ORBIT BRAND',
        'color' => [123, 30, 60], // Burgundy
    ],
    // Showcase items
    [
        'filename' => 'showcase-1.jpg',
        'width' => 1200,
        'height' => 900,
        'text' => 'BRAND IDENTITY',
        'color' => [123, 30, 60],
    ],
    [
        'filename' => 'showcase-2.jpg',
        'width' => 1200,
        'height' => 900,
        'text' => 'DIGITAL DESIGN',
        'color' => [90, 21, 40],
    ],
    [
        'filename' => 'showcase-3.jpg',
        'width' => 1200,
        'height' => 900,
        'text' => 'MOTION GRAPHICS',
        'color' => [107, 25, 50],
    ],
    [
        'filename' => 'showcase-4.jpg',
        'width' => 1200,
        'height' => 900,
        'text' => 'WEB DEVELOPMENT',
        'color' => [140, 28, 55],
    ],
    [
        'filename' => 'showcase-5.jpg',
        'width' => 1200,
        'height' => 900,
        'text' => 'PACKAGING DESIGN',
        'color' => [95, 23, 45],
    ],
    [
        'filename' => 'showcase-6.jpg',
        'width' => 1200,
        'height' => 900,
        'text' => 'UI/UX DESIGN',
        'color' => [115, 27, 52],
    ],
];

// Client logos (simple text-based)
$clientLogos = [
    ['filename' => 'client-1.png', 'text' => 'CLIENT ONE'],
    ['filename' => 'client-2.png', 'text' => 'CLIENT TWO'],
    ['filename' => 'client-3.png', 'text' => 'CLIENT THREE'],
    ['filename' => 'client-4.png', 'text' => 'CLIENT FOUR'],
    ['filename' => 'client-5.png', 'text' => 'CLIENT FIVE'],
    ['filename' => 'client-6.png', 'text' => 'CLIENT SIX'],
];

$outputDir = __DIR__ . '/public/images/';

// Create directory if it doesn't exist
if (!is_dir($outputDir)) {
    mkdir($outputDir, 0755, true);
    echo "✓ Created directory: {$outputDir}\n";
}

// Check if GD library is available
if (!extension_loaded('gd')) {
    die("✗ Error: GD library is not installed. Please install php-gd extension.\n");
}

echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "  ORBIT Placeholder Image Generator\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";

// Generate showcase and about images
foreach ($images as $config) {
    $filepath = $outputDir . $config['filename'];

    // Create image
    $image = imagecreatetruecolor($config['width'], $config['height']);

    // Create gradient effect
    $baseColor = imagecolorallocate($image, $config['color'][0], $config['color'][1], $config['color'][2]);
    $lightColor = imagecolorallocate($image,
        min(255, $config['color'][0] + 30),
        min(255, $config['color'][1] + 30),
        min(255, $config['color'][2] + 30)
    );

    // Fill with gradient
    for ($y = 0; $y < $config['height']; $y++) {
        $ratio = $y / $config['height'];
        $r = (int)($config['color'][0] + ($ratio * 30));
        $g = (int)($config['color'][1] + ($ratio * 30));
        $b = (int)($config['color'][2] + ($ratio * 30));
        $color = imagecolorallocate($image, min(255, $r), min(255, $g), min(255, $b));
        imageline($image, 0, $y, $config['width'], $y, $color);
    }

    // Add circular overlay
    $overlayColor = imagecolorallocatealpha($image, 255, 255, 255, 100);
    $centerX = $config['width'] / 2;
    $centerY = $config['height'] / 2;
    $radius = min($config['width'], $config['height']) / 3;

    imagesetthickness($image, 3);
    imagearc($image, $centerX, $centerY, $radius * 2, $radius * 2, 0, 360, $overlayColor);

    // Add text
    $white = imagecolorallocate($image, 255, 255, 255);
    $fontSize = $config['width'] > 1000 ? 48 : 36;
    $fontFile = null;

    // Try to use system font if available
    $possibleFonts = [
        '/usr/share/fonts/truetype/dejavu/DejaVuSans-Bold.ttf',
        '/usr/share/fonts/TTF/DejaVuSans-Bold.ttf',
        '/System/Library/Fonts/Helvetica.ttc',
    ];

    foreach ($possibleFonts as $font) {
        if (file_exists($font)) {
            $fontFile = $font;
            break;
        }
    }

    if ($fontFile) {
        $bbox = imagettfbbox($fontSize, 0, $fontFile, $config['text']);
        $textWidth = abs($bbox[4] - $bbox[0]);
        $textHeight = abs($bbox[5] - $bbox[1]);
        $x = ($config['width'] - $textWidth) / 2;
        $y = ($config['height'] + $textHeight) / 2;
        imagettftext($image, $fontSize, 0, $x, $y, $white, $fontFile, $config['text']);
    } else {
        // Fallback to built-in font
        $x = ($config['width'] - (strlen($config['text']) * 10)) / 2;
        $y = ($config['height'] - 20) / 2;
        imagestring($image, 5, $x, $y, $config['text'], $white);
    }

    // Save image
    imagejpeg($image, $filepath, 90);
    imagedestroy($image);

    echo "✓ Generated: {$config['filename']} ({$config['width']}x{$config['height']})\n";
}

// Generate client logos
foreach ($clientLogos as $config) {
    $filepath = $outputDir . $config['filename'];

    $width = 400;
    $height = 200;

    // Create transparent PNG
    $image = imagecreatetruecolor($width, $height);
    imagesavealpha($image, true);
    $transparent = imagecolorallocatealpha($image, 0, 0, 0, 127);
    imagefill($image, 0, 0, $transparent);

    // Add text
    $gray = imagecolorallocate($image, 107, 114, 128);
    $fontSize = 24;
    $fontFile = null;

    // Try to use system font
    $possibleFonts = [
        '/usr/share/fonts/truetype/dejavu/DejaVuSans-Bold.ttf',
        '/usr/share/fonts/TTF/DejaVuSans-Bold.ttf',
    ];

    foreach ($possibleFonts as $font) {
        if (file_exists($font)) {
            $fontFile = $font;
            break;
        }
    }

    if ($fontFile) {
        $bbox = imagettfbbox($fontSize, 0, $fontFile, $config['text']);
        $textWidth = abs($bbox[4] - $bbox[0]);
        $textHeight = abs($bbox[5] - $bbox[1]);
        $x = ($width - $textWidth) / 2;
        $y = ($height + $textHeight) / 2;
        imagettftext($image, $fontSize, 0, $x, $y, $gray, $fontFile, $config['text']);
    } else {
        $x = ($width - (strlen($config['text']) * 8)) / 2;
        $y = ($height - 16) / 2;
        imagestring($image, 5, $x, $y, $config['text'], $gray);
    }

    // Save as PNG
    imagepng($image, $filepath);
    imagedestroy($image);

    echo "✓ Generated: {$config['filename']} ({$width}x{$height})\n";
}

echo "\n━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "✓ All placeholder images generated successfully!\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";
echo "📍 Location: {$outputDir}\n";
echo "📝 Total images: " . (count($images) + count($clientLogos)) . "\n\n";
echo "💡 These are temporary placeholders.\n";
echo "   Replace them with your actual images for production.\n";
echo "   See IMAGES_GUIDE.md for specifications.\n\n";
