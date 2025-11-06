# 🎨 Quick Image Optimization Reference

## ⚡ Quick Commands

```bash
# Logo Processing
php artisan images:optimize logos/logo.png --logo

# Remove Background
php artisan images:optimize image.png --remove-bg --tolerance=60

# Resize & Optimize
php artisan images:optimize image.jpg --width=1920 --height=1080 --quality=90

# Batch Process Directory
php artisan images:optimize customers --remove-bg
```

---

## 📐 Standard Sizes

| Type | Dimensions | Format | Quality | Max Size |
|------|-----------|--------|---------|----------|
| Logo (Navbar) | 200x100px | PNG | 90 | 50KB |
| Logo (Footer) | 150x75px | PNG | 90 | 30KB |
| Favicon | 64x64px | PNG | 90 | 10KB |
| Hero Image | 1920x1080px | JPG | 85 | 300KB |
| Customer Logo | 300x150px | PNG | 90 | 100KB |
| Product Image | 1200x800px | JPG | 80 | 200KB |
| Thumbnail | 300x300px | JPG | 75 | 50KB |

---

## 🎯 Tolerance Guide

| Value | Use Case | Description |
|-------|----------|-------------|
| 20-40 | Precise logos | Sharp edges, minimal removal |
| 50-70 | General use | Balanced (recommended) |
| 80-120 | Complex backgrounds | Aggressive removal |

---

## 📁 File Locations

```
storage/app/public/
  ├── logos/           → Brand logos
  ├── customers/       → Customer/partner logos
  ├── heroes/          → Hero/banner images
  └── services/        → Service images
```

Access via: `{{ asset('storage/logos/logo_nobg.png') }}`

---

## ✅ Current Setup

✅ Image Optimizer Service Created  
✅ Artisan Command Available  
✅ Background Removal Implemented  
✅ Batch Processing Supported  
✅ ORBIT Logo Processed  
✅ Customer Management with Logos  
✅ Filament Integration Ready  

---

## 🚀 Workflow

1. **Upload** → Via Filament Admin or copy to storage
2. **Process** → Run `php artisan images:optimize`
3. **Verify** → Check output files
4. **Use** → Reference in Blade templates
5. **Clear Cache** → `php artisan view:clear`

---

## 📞 Common Issues

### Background not removed?
→ Increase `--tolerance` (try 80-100)

### Image too blurry?
→ Increase `--quality` (try 90-95)

### File too large?
→ Decrease dimensions or quality

### Permission error?
→ `chmod -R 775 storage/app/public`

---

**Documentation:** `IMAGE_OPTIMIZATION_GUIDE.md`  
**Command:** `php artisan images:optimize --help`
