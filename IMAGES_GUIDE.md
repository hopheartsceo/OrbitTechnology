# ORBIT Landing Page - Image Assets Guide

## 📸 Required Images

To complete the visual design of your ORBIT landing page, you'll need to add the following images to the `public/images/` directory:

### 1. **About Section**
- **File**: `about-orbit.jpg`
- **Dimensions**: 1000x1000px (1:1 ratio)
- **Content**: Professional image representing ORBIT's brand essence, modern workspace, or design process
- **Style**: Clean, modern, high-quality photography with burgundy/beige tones

### 2. **Showcase/Portfolio Items** (6 images)
- **Files**: 
  - `showcase-1.jpg` - Brand Identity project
  - `showcase-2.jpg` - Digital Design project  
  - `showcase-3.jpg` - Motion Graphics project
  - `showcase-4.jpg` - Web Development project
  - `showcase-5.jpg` - Packaging Design project
  - `showcase-6.jpg` - UI/UX Design project
- **Dimensions**: 1200x900px (4:3 ratio)
- **Content**: High-quality screenshots or mockups of your best work
- **Style**: Professional, clean, showcasing design excellence

### 3. **Client Logos** (6 images)
- **Files**:
  - `client-1.png`
  - `client-2.png`
  - `client-3.png`
  - `client-4.png`
  - `client-5.png`
  - `client-6.png`
- **Dimensions**: 400x200px (transparent PNG)
- **Content**: Logos of companies you've worked with
- **Style**: Clean, professional logos with transparent backgrounds

---

## 🎨 Image Specifications

### Color Palette Reference
- **Primary Burgundy**: #7B1E3C
- **Beige**: #E6D5C3
- **Gray**: #6B7280
- **White**: #FFFFFF

### Image Guidelines
1. **Quality**: Use high-resolution images (minimum 72 DPI for web, 300 DPI is better)
2. **Format**: 
   - JPG for photographs (showcase, about)
   - PNG for logos (with transparency)
3. **Optimization**: Compress images to reduce file size without losing quality
4. **Style**: Maintain consistency with ORBIT's premium, luxury brand aesthetic
5. **Lighting**: Prefer natural, soft lighting over harsh contrasts
6. **Composition**: Clean, minimal, with plenty of negative space

---

## 🔄 Temporary Placeholder Solution

If you don't have images ready yet, you can use placeholder services:

### Option 1: Unsplash (Free High-Quality Photos)
```bash
# Example URLs for testing:
# https://source.unsplash.com/1000x1000/?workspace,design
# https://source.unsplash.com/1200x900/?branding,design
```

### Option 2: Create colored placeholders with PHP GD
I can create a script to generate temporary colored placeholder images.

### Option 3: Use existing logo
You already have `public/logo.png` - we can reuse this creatively for some sections.

---

## 📝 How to Add Images

1. **Download/Create your images** following the specifications above
2. **Place them in**: `/var/www/html/orbit technology/OrbitTechnology/public/images/`
3. **Name them exactly** as specified (e.g., `about-orbit.jpg`, `showcase-1.jpg`)
4. **Set permissions** (if needed):
   ```bash
   chmod 644 public/images/*.{jpg,png}
   ```
5. **Clear cache** and refresh the page:
   ```bash
   php artisan cache:clear
   ```

---

## 🎯 Priority Order

If you can't add all images at once, prioritize:
1. ✅ **About section image** (`about-orbit.jpg`) - Most visible
2. ✅ **First 3 showcase items** (`showcase-1/2/3.jpg`) - Core portfolio
3. ✅ **Client logos** (if you have permissions to use them)
4. ⏳ **Remaining showcase items** - Can be added later

---

## 💡 Tips for Best Results

- **Professional Photography**: Invest in professional photos of your workspace/team
- **Portfolio Shots**: Use high-quality mockups of your best projects
- **Consistent Filters**: Apply similar color grading across all images
- **Brand Alignment**: Ensure images reflect ORBIT's premium positioning
- **Diversity**: Show variety in your work across different mediums

---

## 🚀 Next Steps

1. Gather your images
2. Optimize them (use tools like TinyPNG, ImageOptim)
3. Upload to `public/images/`
4. Test the landing page
5. Adjust image positioning/sizing if needed

---

**Need help creating placeholder images?** Let me know and I can generate temporary colored rectangles with your logo/text overlaid!
