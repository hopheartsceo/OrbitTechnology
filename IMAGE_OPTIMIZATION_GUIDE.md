# 🎨 Image Design & Optimization Guide

## Overview
This guide explains how to optimize all website images, including logos, hero images, customer logos, and other graphics. All images are automatically processed to be web-optimized with proper sizing, compression, and background removal.

---

## 🚀 Quick Start

### Process a Single Logo
```bash
# Remove background and create all sizes
php artisan images:optimize logos/your-logo.png --logo --tolerance=60

# Remove background only
php artisan images:optimize logos/your-logo.png --remove-bg --tolerance=50
```

### Optimize Images
```bash
# Optimize with specific dimensions
php artisan images:optimize hero-image.jpg --width=1920 --height=1080 --quality=90

# Batch optimize directory
php artisan images:optimize customers --width=800 --quality=85
```

---

## 📐 Recommended Image Specifications

### Logos
- **Format:** PNG with transparency
- **Dimensions:** 
  - Navbar: 200x100px
  - Footer: 150x75px
  - Favicon: 64x64px
  - Open Graph: 1200x630px
- **File Size:** < 50KB
- **Background:** Transparent

### Hero Images
- **Format:** JPEG or WebP
- **Dimensions:** 1920x1080px (16:9)
- **File Size:** < 300KB
- **Quality:** 85-90%

### Customer Logos
- **Format:** PNG with transparency
- **Dimensions:** 300x150px (2:1 ratio)
- **File Size:** < 100KB
- **Background:** Transparent

### Product/Service Images
- **Format:** JPEG or WebP
- **Dimensions:** 1200x800px
- **File Size:** < 200KB
- **Quality:** 80-85%

### Thumbnails
- **Format:** JPEG
- **Dimensions:** 300x300px (square)
- **File Size:** < 50KB
- **Quality:** 75-80%

---

## 🔧 Command Options

### Available Commands

```bash
php artisan images:optimize {path} [options]
```

### Options

| Option | Description | Default |
|--------|-------------|---------|
| `--remove-bg` | Remove background from images | false |
| `--logo` | Process as logo (remove bg + sizes) | false |
| `--quality=N` | JPEG quality (0-100) | 85 |
| `--width=N` | Maximum width in pixels | original |
| `--height=N` | Maximum height in pixels | original |
| `--tolerance=N` | Background removal sensitivity (0-255) | 50 |

### Examples

```bash
# Process main logo
php artisan images:optimize logo.png --logo

# Optimize hero image
php artisan images:optimize hero.jpg --width=1920 --height=1080 --quality=90

# Remove background from customer logos
php artisan images:optimize customers --remove-bg --tolerance=60

# Batch resize product images
php artisan images:optimize products --width=1200 --quality=85
```

---

## 📂 Directory Structure

```
storage/app/public/
├── logos/
│   ├── orbit-logo.png              # Original logo
│   ├── orbit-logo_nobg.png         # Background removed
│   └── orbit-logo_optimized.png    # Optimized versions
│
├── customers/
│   ├── customer1.png
│   ├── customer1_nobg.png
│   └── ...
│
├── heroes/
│   ├── hero-1.jpg
│   ├── hero-1_optimized.jpg
│   └── ...
│
└── services/
    ├── service-1.jpg
    ├── service-1_optimized.jpg
    └── ...
```

---

## 🎯 Usage in Filament

### Upload Customer Logo

1. Go to `/admin/customers`
2. Click "Create" or edit existing
3. Upload logo image
4. Image will be automatically stored and can be optimized later

### Optimize Uploaded Images

After uploading through Filament:

```bash
# Optimize all customer logos
php artisan images:optimize customers --remove-bg

# Optimize all hero images
php artisan images:optimize heroes --width=1920 --quality=90
```

---

## 🖼️ Background Removal

### How It Works

The background removal algorithm:
1. Detects the background color from image corners
2. Calculates color distance for each pixel
3. Makes similar pixels transparent
4. Saves as PNG with alpha channel

### Tolerance Settings

- **Low (20-40):** Only removes exact background matches (sharp edges)
- **Medium (50-70):** Balanced removal (recommended)
- **High (80-120):** Aggressive removal (may affect edges)

### Examples

```bash
# Conservative (preserves details)
php artisan images:optimize logo.png --remove-bg --tolerance=40

# Balanced (recommended)
php artisan images:optimize logo.png --remove-bg --tolerance=60

# Aggressive (clean backgrounds)
php artisan images:optimize logo.png --remove-bg --tolerance=90
```

---

## 💡 Best Practices

### Before Upload
- Use high-resolution source images (2x-3x final size)
- Ensure good lighting and contrast
- Avoid gradients in logos if possible
- Use solid, consistent backgrounds for easy removal

### After Upload
- Run optimization command immediately
- Check output files for quality
- Adjust tolerance if background not fully removed
- Re-run with different settings if needed

### File Naming
- Use lowercase with hyphens: `customer-name-logo.png`
- No spaces or special characters
- Descriptive names: `hero-homepage-v2.jpg`

---

## 🔄 Workflow

### New Logo
```bash
1. Upload via Filament or copy to storage/app/public/logos/
2. Run: php artisan images:optimize logos/new-logo.png --logo
3. Update references in code to use: storage/logos/new-logo_nobg.png
4. Clear cache: php artisan view:clear
```

### Batch Process
```bash
1. Upload multiple files to directory
2. Run: php artisan images:optimize directory-name --remove-bg
3. Review processed files
4. Delete originals if satisfied (keep backups!)
```

---

## 📊 Performance Tips

### Compression Quality

| Use Case | Quality | File Size | Visual Quality |
|----------|---------|-----------|----------------|
| Logos | 90 | Small | Excellent |
| Heroes | 85 | Medium | Very Good |
| Products | 80 | Small-Medium | Good |
| Thumbnails | 75 | Very Small | Acceptable |

### Format Selection

- **PNG:** Logos, icons, graphics with transparency
- **JPEG:** Photos, heroes, complex images
- **WebP:** Modern browsers (best compression)

---

## 🛠️ Troubleshooting

### Background Not Fully Removed

**Problem:** White edges or partial background remains

**Solutions:**
```bash
# Increase tolerance
php artisan images:optimize image.png --remove-bg --tolerance=80

# Try different tolerance values
php artisan images:optimize image.png --remove-bg --tolerance=100
```

### Image Quality Too Low

**Problem:** Optimized image looks blurry

**Solutions:**
```bash
# Increase quality
php artisan images:optimize image.jpg --quality=95

# Don't downscale too much
php artisan images:optimize image.jpg --width=2000  # Instead of 800
```

### File Size Too Large

**Problem:** Optimized file is still large

**Solutions:**
```bash
# Lower quality
php artisan images:optimize image.jpg --quality=75

# Resize dimensions
php artisan images:optimize image.jpg --width=1200 --quality=80
```

---

## 📱 Responsive Images

### Generate Multiple Sizes

```php
// In your service/controller
$optimizer = app(ImageOptimizerService::class);

$sizes = [
    ['width' => 300, 'name' => 'thumbnail'],
    ['width' => 768, 'name' => 'mobile'],
    ['width' => 1024, 'name' => 'tablet'],
    ['width' => 1920, 'name' => 'desktop'],
];

foreach ($sizes as $size) {
    $optimizer->optimizeImage($path, [
        'width' => $size['width'],
        'quality' => 85,
    ]);
}
```

---

## ✅ Current Status

### Processed Files

- ✅ Main ORBIT logo (background removed, multiple sizes created)
- ✅ Sample customer logos seeded
- ✅ Image optimization service active
- ✅ Artisan command available

### Next Steps

1. Upload your actual logo to `/admin` or `storage/app/public/logos/`
2. Run the optimization command
3. Upload customer logos via `/admin/customers`
4. Batch optimize customer logos
5. Optimize hero and other images

---

## 🎓 Learning Resources

### Test the System

```bash
# 1. Copy test image
cp public/logo.png storage/app/public/test.png

# 2. Remove background
php artisan images:optimize test.png --remove-bg

# 3. Check output
ls -lh storage/app/public/test*

# 4. View in browser
http://yoursite.test/storage/test_nobg.png
```

### Verify Results

1. Original: `storage/app/public/test.png`
2. Processed: `storage/app/public/test_nobg.png`
3. Compare file sizes and visual quality

---

## 📞 Support

### Common Issues

**Permission Denied**
```bash
chmod -R 775 storage/app/public
chown -R www-data:www-data storage/app/public
```

**Memory Limit**
```bash
# Increase PHP memory in php.ini
memory_limit = 512M
```

**GD Library Missing**
```bash
# Install GD extension
sudo apt-get install php-gd
sudo systemctl restart apache2
```

---

## 🔐 Security

### File Upload Validation

All Filament uploads automatically validate:
- File type (images only)
- File size (max 2MB)
- Image dimensions
- MIME type verification

### Storage Security

- Files stored in `storage/app/public/`
- Accessible via symlink: `public/storage`
- Protected from direct script execution
- Regular backups recommended

---

**Last Updated:** November 6, 2025
**Version:** 1.0.0
