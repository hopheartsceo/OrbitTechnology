# Filament Admin Panel - Quick Start Guide

## 🚀 Getting Started

### Access the Admin Panel
1. Navigate to: **http://localhost:8000/admin**
2. Login with your credentials:
   - Email: `info@ot.com.sa`
   - Password: *(your admin password)*

---

## 🌐 Language Switching

### Change Admin UI Language
- Look for the **language switcher** in the top navigation bar
- Click to toggle between:
  - 🇸🇦 **العربية** (Arabic)
  - 🇬🇧 **English**
- Your preference is saved automatically

---

## 📝 Managing Content

### Content Management Menu
All landing page content is organized under **"Content Management"** in the sidebar:

1. **General Settings** (🌐) - Site title, navigation menu, footer
2. **Hero Sections** (⭐) - Main homepage banners
3. **Features** (✨) - Product/service features
4. **Services** (💼) - Service offerings
5. **Pricing Plans** (💵) - Pricing tiers
6. **Statistics** (📊) - Stats/metrics display
7. **Industry Sectors** (🏢) - Target industries
8. **Trust Badges** (🛡️) - Security/trust indicators
9. **Contact Information** (📞) - Contact details

---

## ✏️ Creating Content

### Step-by-Step
1. Click on any resource in the sidebar (e.g., "Features")
2. Click the **"New Feature"** button (top right)
3. Fill in the form:
   - **Language**: Select 🇬🇧 English or 🇸🇦 Arabic
   - **Display Order**: Lower numbers appear first (0, 1, 2...)
   - **Active**: Toggle ON to publish, OFF to hide
   - Fill remaining fields (title, description, etc.)
4. Click **"Create"** to save

### 💡 Pro Tips
- Always create content in **both languages** (EN and AR)
- Use the **same order number** for matching content
- Preview changes by toggling Active ON/OFF
- Use **placeholders** in forms as examples

---

## 🔍 Finding Content

### Search & Filters
- **Search**: Type in the search box above the table
- **Language Filter**: Dropdown to show only EN or AR content
- **Active Status**: Toggle to show active/inactive/all items
- **Type Filter**: (Contact Info only) Filter by phone/email/etc.

---

## ✂️ Editing Content

### Edit Single Item
1. Find the item in the table
2. Click the **edit icon** (pencil) in the Actions column
3. Make changes
4. Click **"Save changes"**

### Bulk Operations
1. **Select items**: Check boxes on the left of each row
2. Choose **bulk action** from dropdown:
   - **Activate** - Make items visible
   - **Deactivate** - Hide items
   - **Delete** - Remove permanently (with confirmation)
3. Confirm action

---

## 🔄 Reordering Content

### Drag-and-Drop
1. Navigate to any resource (Features, Services, etc.)
2. Look for the **drag handle** (⋮⋮) on the left of each row
3. **Click and hold** the handle
4. **Drag** the row up or down
5. **Release** to save new order automatically

> Works for: Hero Sections, Features, Services, Pricing, Stats, Sectors, Trust Badges, Contact Info

---

## 📋 Content Types Guide

### 1. General Settings
**Purpose**: Site-wide translations (navigation, footer)

**Key Fields**:
- Site Title: Main website name
- Site Description: SEO description
- Navigation Menu: Home, Services, Pricing, Contact, Login labels
- Footer Copyright: Copyright text

**Tips**: Only create **2 records** (one EN, one AR)

---

### 2. Hero Sections
**Purpose**: Main banner on homepage

**Key Fields**:
- Headline: Big bold title
- Subheadline: Supporting text
- Primary Button: Main CTA (e.g., "Get Started")
- Secondary Button: Alternative action (e.g., "View Pricing")

**Tips**: 
- Keep headlines short (5-10 words)
- Button URLs: Use `#section-id` for anchors or full URLs

---

### 3. Features
**Purpose**: Product/service features section

**Key Fields**:
- Icon: FontAwesome class (e.g., `fa-solid fa-rocket`)
- Title: Feature name
- Description: Feature benefits

**Tips**:
- Browse icons at [fontawesome.com/icons](https://fontawesome.com/icons)
- Aim for 4-6 features total

---

### 4. Services
**Purpose**: Main service offerings

**Key Fields**:
- Icon: FontAwesome class (e.g., `fa-solid fa-message`)
- Title: Service name
- Description: Service details

**Tips**:
- Similar to Features but more detailed descriptions
- Typically 3-6 services

---

### 5. Pricing Plans
**Purpose**: Pricing tiers display

**Key Fields**:
- Plan Name: Basic, Pro, Enterprise, etc.
- Price: Numeric value (e.g., 0.50)
- Billing Period: "per message", "per month", etc.
- Featured: Toggle for "best value" badge

**Tips**:
- Set one plan as Featured (typically mid-tier)
- Use decimals for precision (0.01)

---

### 6. Statistics
**Purpose**: Achievement metrics

**Key Fields**:
- Number/Value: "500+", "99.9%", "10K+"
- Label: What the number represents

**Tips**:
- Keep numbers impressive but realistic
- Use + or % symbols for impact

---

### 7. Industry Sectors
**Purpose**: Target industries list

**Key Fields**:
- Sector Name: Industry vertical name

**Tips**:
- Simple list format
- Examples: Healthcare, E-commerce, Education, Finance

---

### 8. Trust Badges
**Purpose**: Security/compliance indicators

**Key Fields**:
- Icon: FontAwesome shield/lock icons
- Text: Badge description

**Tips**:
- Examples: "ISO Certified", "GDPR Compliant", "256-bit Encryption"
- Use shield/lock icons for trust

---

### 9. Contact Information
**Purpose**: Contact details section

**Key Fields**:
- Type: Phone, Email, Address, WhatsApp, Social
- Icon: Relevant icon for contact type
- Title: Label (e.g., "Call Us")
- Value: Display text (e.g., "+966 12 345 6789")
- Link (optional): Clickable action (e.g., `tel:+966123456789`)

**Tips**:
- Link formats:
  - Phone: `tel:+966123456789`
  - Email: `mailto:info@example.com`
  - WhatsApp: `https://wa.me/966123456789`
  - Website: `https://example.com`

---

## 🎨 Icon Reference

### FontAwesome Icons
**Format**: `fa-solid fa-icon-name` or `fa-brands fa-brand-name`

**Popular Icons**:
- Rocket: `fa-solid fa-rocket`
- Message: `fa-solid fa-message`
- Shield: `fa-solid fa-shield-halved`
- Chart: `fa-solid fa-chart-line`
- Phone: `fa-solid fa-phone`
- Envelope: `fa-solid fa-envelope`
- Location: `fa-solid fa-location-dot`
- WhatsApp: `fa-brands fa-whatsapp`

**Browse all icons**: [fontawesome.com/icons](https://fontawesome.com/icons)

---

## ⚠️ Common Mistakes to Avoid

1. ❌ **Forgetting to create both languages** - Always add EN and AR versions
2. ❌ **Wrong icon format** - Use `fa-solid fa-name`, not just `fa-name`
3. ❌ **Leaving items inactive** - Toggle Active ON to publish
4. ❌ **Duplicate order numbers** - Use unique orders for proper sorting
5. ❌ **Missing translations** - Keep EN and AR content synchronized

---

## 🆘 Troubleshooting

### Content Not Appearing on Website
- ✅ Check if item is **Active** (toggle must be ON)
- ✅ Verify **Language** matches route (EN for /en, AR for /ar)
- ✅ Check **Order** number (items with order 0+ appear)
- ✅ Clear browser cache (Ctrl+F5)

### Can't Save Form
- ✅ Check **required fields** (marked with *)
- ✅ Verify **icon format** (must be valid FontAwesome class)
- ✅ Check **price format** (numeric only, no symbols except decimals)

### Language Switcher Not Working
- ✅ Refresh page (F5)
- ✅ Check browser console for errors
- ✅ Log out and log back in

---

## 📊 Workflow Best Practices

### For New Content
1. Start with **English** version
2. Create **Arabic** translation immediately
3. Use **same order** number for both
4. Test on frontend (/en and /ar routes)
5. Activate both when ready

### For Content Updates
1. Edit **English** first
2. Update **Arabic** to match
3. Check frontend for consistency

### For Seasonal Content
1. Create new items with **high order** numbers
2. Keep **inactive** until ready
3. Activate all at once
4. Deactivate old content (don't delete for history)

---

## 🎯 Quick Actions

### Publish New Feature
```
1. Features > New Feature
2. Select Language: 🇬🇧 English
3. Order: 0 (or next available number)
4. Icon: fa-solid fa-rocket
5. Title: "Fast Performance"
6. Description: "Lightning-fast message delivery..."
7. Active: ON
8. Create
9. Repeat for 🇸🇦 Arabic
```

### Update Pricing
```
1. Pricing Plans > Find plan > Edit
2. Update Price field
3. Save changes
4. Repeat for other language version
```

### Reorder Services
```
1. Services > Table view
2. Drag items by ⋮⋮ handle
3. Drop in desired position
4. Auto-saved
```

---

## 📞 Support

### Need Help?
- Check this guide first
- Review the comprehensive documentation: `FILAMENT_ENHANCEMENTS_COMPLETE.md`
- Contact technical support

---

**Last Updated**: November 2024
**Admin Panel Version**: Filament 3.3.43
