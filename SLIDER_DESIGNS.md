# Slider Design Options

This document describes the 5 professional slider designs available in the Filament backend.

## How to Change Designs

1. Go to your Filament admin panel
2. Navigate to the page containing the slider block
3. Edit the slider block
4. Select your preferred design from the "Slider Design" dropdown
5. Save the changes

## Design Overview

### Design 1: Side-by-Side (Text Left, Image Right)
**Best for:** Professional corporate presentations, product showcases

**Features:**
- Clean split-screen layout
- Text on left (50%) with dark gradient background
- Image on right (50%) fills container
- Professional and balanced appearance
- Great for detailed content with images

**Layout:**
```
┌─────────────┬─────────────┐
│   TEXT      │   IMAGE     │
│   (50%)     │   (50%)     │
└─────────────┴─────────────┘
```

---

### Design 2: Text Overlay on Image (Left Aligned)
**Best for:** Hero sections, impactful statements, dramatic presentations

**Features:**
- Full-width background image
- Text overlay on left side with gradient fade
- Bold, large typography (48px title)
- Dramatic dark overlay from left to right
- Perfect for attention-grabbing content

**Layout:**
```
┌─────────────────────────────┐
│ [Gradient] TEXT             │
│              IMAGE          │
└─────────────────────────────┘
```

---

### Design 3: Centered Text Overlay on Image
**Best for:** Event announcements, inspirational content, hero banners

**Features:**
- Full-width background image
- Centered text overlay
- Large, bold typography (56px title, uppercase)
- Subtle dark overlay across entire image
- Elegant and impactful
- Perfect for short, powerful messages

**Layout:**
```
┌─────────────────────────────┐
│                             │
│         TEXT                │
│      (Centered)             │
│         IMAGE               │
└─────────────────────────────┘
```

---

### Design 4: Side-by-Side (Image Left, Text Right)
**Best for:** Visual-first content, product highlights, image-focused presentations

**Features:**
- Image on left (50%) - visual focus
- Text on right (50%) with green gradient background
- Reversed layout from Design 1
- Green theme for text area (#28a745)
- Great when image is the primary focus

**Layout:**
```
┌─────────────┬─────────────┐
│   IMAGE     │   TEXT      │
│   (50%)     │   (50%)     │
└─────────────┴─────────────┘
```

---

### Design 5: Full-Width Image with Text Below
**Best for:** Clean, modern layouts, blog-style presentations, detailed descriptions

**Features:**
- Full-width image at top
- Text content below in light background
- Clean, modern aesthetic
- White/light gray background for text
- Dark text on light background (high contrast)
- Perfect for longer content descriptions

**Layout:**
```
┌─────────────────────────────┐
│         IMAGE               │
│      (Full Width)           │
├─────────────────────────────┤
│         TEXT                │
│      (Full Width)           │
└─────────────────────────────┘
```

## Design Comparison

| Feature | Design 1 | Design 2 | Design 3 | Design 4 | Design 5 |
|---------|----------|----------|----------|----------|----------|
| **Layout** | Split 50/50 | Overlay | Overlay | Split 50/50 | Stacked |
| **Text Position** | Left | Left Overlay | Center Overlay | Right | Below |
| **Image Style** | Side-by-side | Background | Background | Side-by-side | Full-width |
| **Best For** | Corporate | Hero | Events | Visual-first | Modern |
| **Text Background** | Dark | Transparent | Transparent | Green | Light |
| **Typography Size** | Medium | Large | Extra Large | Medium | Medium |

## Responsive Behavior

All designs are fully responsive:

- **Desktop (>991px):** Full design as described
- **Tablet (576-991px):** Adjusted heights and font sizes
- **Mobile (<576px):** Stacked layouts, optimized spacing, hidden controls

## Image Guidelines

**Recommended Image Sizes:**
- **Design 1 & 4:** 1200x600px (2:1 ratio)
- **Design 2 & 3:** 1920x800px (2.4:1 ratio) 
- **Design 5:** 1920x600px (3.2:1 ratio)

**Image Format:** JPG or PNG, optimized for web

**Important:** All images use `object-fit: cover` with smart positioning (`center 30%`) to minimize head cropping while filling containers.

## Customization Tips

1. **Design 1 & 4:** Best for detailed content - use when you have substantial text
2. **Design 2:** Use for impactful, short messages with dramatic images
3. **Design 3:** Perfect for event announcements or inspirational quotes
4. **Design 4:** Choose when the image is the star of the slide
5. **Design 5:** Ideal for modern, clean presentations with detailed descriptions

## Technical Details

- All designs use the same animation system
- Consistent button styling across all designs
- Carousel controls (arrows, dots) work with all designs
- All designs are accessible and SEO-friendly
- CSS is optimized and cached for performance

## Support

If you need to customize any design further, the CSS classes follow this pattern:
- `.slider-design1` - Design 1 styles
- `.slider-design2` - Design 2 styles
- `.slider-design3` - Design 3 styles
- `.slider-design4` - Design 4 styles
- `.slider-design5` - Design 5 styles

All styles are in `/public/css/sliders.css`

