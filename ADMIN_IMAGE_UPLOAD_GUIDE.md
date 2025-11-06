# 📸 Admin Image Upload Guide

## ✨ Automatic Image Optimization

All images uploaded through the Filament admin panel are **automatically optimized**! This means:

- ✅ **Automatic background removal** (for logos)
- ✅ **Automatic resizing** to optimal dimensions
- ✅ **Automatic compression** for faster loading
- ✅ **Maintains quality** while reducing file size

---

## 🎯 Customer Logos

### Upload Process

1. Go to **Customers** in the admin panel
2. Click **Create** or edit existing customer
3. Upload logo image (PNG, JPG, or SVG)
4. Click **Save**

### ✨ What Happens Automatically

- Background is removed (white/light backgrounds)
- Image is resized to 300x150px
- Quality is optimized to 90%
- Compressed to reduce file size
- Success notification appears

### 💡 Tips for Best Results

- **Format:** PNG with transparent background (best)
- **Size:** Upload high-resolution (2x-3x final size)
- **Background:** Solid white or light color (easiest to remove)
- **Quality:** Upload best quality you have
- **Naming:** Use descriptive names: `company-name-logo.png`

### Manual Optimization

If you need to re-optimize a logo:

1. Edit the customer
2. Click **Optimize Logo** button in header
3. Wait for success notification

---

## 🖼️ Hero Images

Hero images are automatically optimized when uploaded through Hero Section:

- Resized to 1920x1080px (Full HD)
- Compressed to 85% quality
- Format converted if needed

### Best Practices

- **Resolution:** Upload 2560x1440px or higher
- **Format:** JPG for photos
- **File Size:** Keep under 5MB before upload
- **Subject:** Center important content

---

## 📐 Recommended Upload Sizes

### Before Optimization (Upload These Sizes)

| Image Type | Recommended Upload Size |
|-----------|------------------------|
| Customer Logo | 600x300px or higher |
| Hero Image | 2560x1440px |
| Product Image | 2400x1600px |
| Icon/Badge | 200x200px |

### After Optimization (Automatic)

| Image Type | Final Size | Format |
|-----------|-----------|--------|
| Customer Logo | 300x150px | PNG |
| Hero Image | 1920x1080px | JPG |
| Product Image | 1200x800px | JPG |
| Icon/Badge | 100x100px | PNG |

---

## 🎨 File Format Guide

### When to Use PNG
- ✅ Logos
- ✅ Icons
- ✅ Graphics with transparency
- ✅ Text-heavy images

### When to Use JPG
- ✅ Photographs
- ✅ Hero images
- ✅ Backgrounds
- ✅ Complex images

### When to Use SVG
- ✅ Vector logos
- ✅ Icons (if simple)
- ⚠️ Note: SVG won't be auto-optimized

---

## ⚙️ Optimization Settings

### Current Defaults

**Customer Logos:**
- Background Removal: ON
- Tolerance: 60
- Quality: 90%
- Max Width: 300px
- Max Height: 150px

**Hero Images:**
- Background Removal: OFF
- Quality: 85%
- Max Width: 1920px
- Max Height: 1080px

**Product Images:**
- Background Removal: OFF
- Quality: 80%
- Max Width: 1200px
- Max Height: 800px

---

## 🚨 Troubleshooting

### Background Not Fully Removed?

**Problem:** Logo still has white edges or partial background

**Solution:**
1. Edit the customer
2. Click "Optimize Logo" button
3. OR: Upload image with more contrast
4. OR: Contact developer to adjust tolerance

### Image Looks Blurry?

**Problem:** Optimized image appears low quality

**Solution:**
1. Upload higher resolution source image
2. Ensure source is at least 2x final size
3. Use PNG for logos, JPG for photos

### File Upload Fails?

**Problem:** Upload says "file too large"

**Solution:**
1. Check file is under 2MB
2. Compress image before upload using online tool
3. Reduce dimensions of source image

### Wrong Image Appears?

**Problem:** Different image shows on website

**Solution:**
1. Clear browser cache (Ctrl+F5 or Cmd+Shift+R)
2. Wait a few minutes for cache to update
3. Check correct image uploaded in admin

---

## 📊 File Size Targets

### After Optimization

| Image Type | Target Size | Max Acceptable |
|-----------|-------------|----------------|
| Logo | < 50KB | 100KB |
| Hero | < 300KB | 500KB |
| Product | < 200KB | 400KB |
| Thumbnail | < 50KB | 100KB |
| Icon | < 20KB | 50KB |

---

## ✅ Upload Checklist

Before uploading images:

- [ ] Image is high quality (not pixelated)
- [ ] Dimensions are at least 2x final size
- [ ] File name is descriptive (no spaces)
- [ ] Background is solid color (if logo)
- [ ] Format is appropriate (PNG/JPG/SVG)
- [ ] File size is under 2MB

After uploading:

- [ ] Check preview in admin panel
- [ ] View on actual website
- [ ] Verify image looks good on mobile
- [ ] Check page load speed (should be fast)

---

## 🎓 Examples

### Good Logo Upload
```
✅ company-logo.png
✅ 600x300px
✅ Transparent PNG
✅ 150KB file size
✅ Solid white background (for removal)
```

### Bad Logo Upload
```
❌ IMG_1234.jpg
❌ 100x50px (too small)
❌ JPG format (no transparency)
❌ 5MB file size (too large)
❌ Gradient background (hard to remove)
```

---

## 🔐 Image Storage

All uploaded images are stored in:
```
storage/app/public/customers/
storage/app/public/heroes/
storage/app/public/logos/
```

And accessible via:
```
https://yoursite.com/storage/customers/image.png
```

---

## 🆘 Need Help?

### Common Questions

**Q: Can I upload GIF animations?**
A: Yes, but they won't be optimized and may slow down the site.

**Q: What happens to my original image?**
A: Original is replaced with optimized version. Keep backups!

**Q: Can I disable auto-optimization?**
A: Contact developer - it's recommended to keep it on.

**Q: How do I optimize existing images?**
A: Use the "Optimize Logo" button when editing, or contact developer.

**Q: Does this work for all image uploads?**
A: Currently: Customers, Heroes, Products. More coming soon!

---

## 📞 Support

If you encounter issues:

1. Check this guide first
2. Try clearing browser cache
3. Try different image format
4. Contact technical support

**Technical Support:**
- Check server logs for errors
- Run: `php artisan images:optimize path/to/image.png`
- Check storage permissions
- Verify GD library is installed

---

**Last Updated:** November 6, 2025
**Version:** 1.0.0
**Applies to:** Customer logos (more resources coming soon)
