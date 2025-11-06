# 🎨 ORBIT Font Installation Guide

## Overview
The ORBIT landing page uses **premium brand fonts** that are **not available via Google Fonts**. Currently, the page uses **fallback fonts** from Google Fonts that approximate the brand aesthetic.

---

## Current Font Stack (Active Now)

| Purpose | Primary (not loaded) | Fallback (ACTIVE) | Source |
|---------|---------------------|-------------------|---------|
| **Headlines** | Botera | **Playfair Display** | Google Fonts ✓ |
| **Body Text** | Montserrat | **Montserrat** | Google Fonts ✓ |
| **Arabic** | Somar | **Tajawal** | Google Fonts ✓ |

---

## 🔴 Why Fonts Are Not Changing

**Botera**, **Somar**, and **Gotham** are **commercial/premium fonts** that require:
1. **Purchasing a web license** from the font foundry
2. **Downloading font files** (WOFF2/WOFF format)
3. **Hosting them locally** in your project

### What's Currently Loading:
- ✅ **Playfair Display** (serif fallback for Botera)
- ✅ **Montserrat** (sans-serif body — also your secondary choice!)
- ✅ **Tajawal** (Arabic fallback for Somar)

These are high-quality Google Fonts that give a **similar premium feel**, but if you want the **exact ORBIT brand fonts**, follow the installation steps below.

---

## 📦 Step 1: Obtain Font Files

### Option A: Purchase Botera
- **Font Name:** Botera Serif
- **Foundry:** Search font marketplaces (MyFonts, Adobe Fonts, FontShop)
- **License:** Web embedding license required
- **Files Needed:** 
  - `Botera-Regular.woff2`
  - `Botera-SemiBold.woff2`
  - `Botera-Bold.woff2`

### Option B: Purchase Somar (Arabic)
- **Font Name:** Somar Arabic
- **Foundry:** Check Arabic type foundries or Arabic Font Archive
- **Files Needed:**
  - `Somar-Regular.woff2`
  - `Somar-Bold.woff2`

### Option C: Use Gotham (if available)
- **Alternative:** Montserrat is already loaded and is a great geometric sans-serif similar to Gotham
- If you have Gotham licenses, add them similarly

---

## 📂 Step 2: Place Font Files in Project

Create a fonts directory in your public assets:

```bash
mkdir -p public/fonts/botera
mkdir -p public/fonts/somar
```

Place your font files:
```
public/fonts/
├── botera/
│   ├── Botera-Regular.woff2
│   ├── Botera-SemiBold.woff2
│   └── Botera-Bold.woff2
└── somar/
    ├── Somar-Regular.woff2
    └── Somar-Bold.woff2
```

---

## 🎨 Step 3: Add @font-face Rules

Add this CSS to `resources/views/orbit-landing.blade.php` **inside the `<style>` tag, right after the `:root` block**:

```css
/* === LOCAL FONT LOADING === */
@font-face {
    font-family: 'Botera';
    src: url('{{ asset('fonts/botera/Botera-Regular.woff2') }}') format('woff2');
    font-weight: 400;
    font-style: normal;
    font-display: swap;
}

@font-face {
    font-family: 'Botera';
    src: url('{{ asset('fonts/botera/Botera-SemiBold.woff2') }}') format('woff2');
    font-weight: 600;
    font-style: normal;
    font-display: swap;
}

@font-face {
    font-family: 'Botera';
    src: url('{{ asset('fonts/botera/Botera-Bold.woff2') }}') format('woff2');
    font-weight: 700;
    font-style: normal;
    font-display: swap;
}

@font-face {
    font-family: 'Somar';
    src: url('{{ asset('fonts/somar/Somar-Regular.woff2') }}') format('woff2');
    font-weight: 400;
    font-style: normal;
    font-display: swap;
    unicode-range: U+0600-06FF, U+0750-077F, U+08A0-08FF, U+FB50-FDFF, U+FE70-FEFF;
}

@font-face {
    font-family: 'Somar';
    src: url('{{ asset('fonts/somar/Somar-Bold.woff2') }}') format('woff2');
    font-weight: 700;
    font-style: normal;
    font-display: swap;
    unicode-range: U+0600-06FF, U+0750-077F, U+08A0-08FF, U+FB50-FDFF, U+FE70-FEFF;
}
```

---

## 🔍 Step 4: Verify Font Loading

1. **Open DevTools** (F12) in your browser
2. Go to **Network tab**
3. Filter by **Fonts**
4. Reload the page (`/orbit/en`)
5. You should see:
   - ✅ `Botera-Regular.woff2`
   - ✅ `Botera-Bold.woff2`
   - ✅ `Somar-Regular.woff2`

6. **Inspect an `<h1>` element**:
   - Computed style should show: `font-family: "Botera", "Playfair Display", ...`

---

## 🎯 Current Typography Hierarchy (Updated)

| Element | Font | Weight | Size | Notes |
|---------|------|--------|------|-------|
| Hero Title (H1) | Botera → **Playfair** | 700 | 72-90px | Uppercase, generous spacing |
| Section Titles (H2) | Botera → **Playfair** | 600 | 48-60px | Premium serif |
| Subheadings (H3) | **Montserrat** | 600 | 24-30px | Sans-serif contrast |
| Body Text | **Montserrat** | 400 | 16-18px | High readability |
| Buttons/CTAs | **Montserrat** | 600 | 14-16px | All caps, wide tracking |
| Captions | **Montserrat** | 400 | 12-14px | Uppercase labels |
| Arabic Headlines | Somar → **Tajawal** | 700 | Auto | Mirrors English hierarchy |

---

## ✅ Quick Test: Are Fonts Working?

Run this in your browser console on `/orbit/en`:

```javascript
const h1 = document.querySelector('h1');
const computedFont = window.getComputedStyle(h1).fontFamily;
console.log('H1 Font:', computedFont);

// Should show: "Botera", "Playfair Display", "Cormorant Garamond", serif
// If Botera files installed: "Botera" will be first
// If not: "Playfair Display" is active (current state)
```

---

## 💡 Recommendations

### If You Can't Get Botera/Somar:
The current **Playfair Display + Montserrat + Tajawal** stack is:
- ✅ **Professional and elegant**
- ✅ **Free and web-safe**
- ✅ **Similar premium aesthetic**
- ✅ **Excellent readability**

### Performance Tip:
Once you add local fonts, add preload links in `<head>`:

```html
<link rel="preload" href="{{ asset('fonts/botera/Botera-Bold.woff2') }}" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="{{ asset('fonts/somar/Somar-Regular.woff2') }}" as="font" type="font/woff2" crossorigin>
```

---

## 📞 Need Help?

If you need assistance:
1. Verify font file formats (WOFF2 preferred)
2. Check file paths in browser Network tab
3. Ensure web license covers your domain
4. Test with DevTools font inspector

---

**Current Status:** ✅ Fallback fonts active (Playfair + Montserrat + Tajawal)  
**To Activate Botera/Somar:** Follow Steps 1-3 above
