---
name: frontend-design
description: Frontend design skill for Vaquita web application. Defines the visual system, design tokens, component architecture, and coding rules to follow when building any UI — landing pages, dashboards, admin panels, or new features.
---

# Frontend Design Skill — Vaquita

> This document is the **single source of truth** for all frontend UI decisions in the Vaquita web application.
> Every page, component, and feature must follow the principles, tokens, and rules defined here.

---

## 1. Operating Principle

- Don't just generate UI. Design and implement a visual system that is **distinctive**, **intentional**, **functional**, and **memorable**.
- If the output feels like a generic template, it has failed. Redesign.
- Every element must serve a purpose: conversion, clarity, or trust.

---

## 2. Design Direction

| Attribute         | Value                                                              |
| ----------------- | ------------------------------------------------------------------ |
| **Aesthetic**     | Organic Professional — clean, warm, trustworthy                    |
| **Purpose**       | Persuasive (public) · Functional (dashboard/admin)                 |
| **Tone**          | Organic (primary) · Playful (secondary)                            |
| **Visual Anchor** | Blob-shaped frames + floating pill navigation + teal color system  |

> "If the logo were removed, the organic blob shapes and warm teal palette would still make the UI instantly recognizable as Vaquita."

---

## 3. Color System

All colors are registered in `tailwind.config.js`. **Never use raw hex values in templates** — always use Tailwind token names.

```css
:root{
  --primary:#4AAF94;
  --primary-soft:#AAD2C7;
  --background:#FBFDFC;
  --text:#111111;
}
```

| Token                | Hex        | Tailwind Class        | Usage                                         |
| -------------------- | ---------- | --------------------- | --------------------------------------------- |
| `primary`            | `#4AAF94`  | `text-primary`        | CTAs, headings, brand accent, sidebar active  |
| `primary-soft`       | `#AAD2C7`  | `bg-primary-soft`     | Gradient endpoints, icon backgrounds, hover   |
| `primary-container`  | `#AAD2C7`  | `bg-primary-container`| Card hover states, subtle backgrounds, tags   |
| `surface`            | `#FBFDFC`  | `bg-surface`          | Page background                                |
| `surface-alt`        | `#f2f4f3`  | `bg-surface-alt`      | Section alternation, sidebar, table rows      |
| `accent-rose`        | `#994158`  | `text-accent-rose`    | Badges, pricing highlights, alerts            |
| `accent-pink`        | `#e67f96`  | `bg-accent-pink`      | Safety badge, warm accent                     |
| `ink`                | `#111111`  | `text-ink`            | Body text, headings                            |

### Gradient

```css
/* hero-gradient — defined globally in app.css */
background: linear-gradient(135deg, #4AAF94 0%, #AAD2C7 100%);
```

### Color Usage Rules

1. **Public pages** (landing, pricing): Use the full palette — primary, blobs, gradients
2. **Dashboard/admin**: Use `surface`, `surface-alt`, `primary` for accents. Keep it calm and functional.
3. **Destructive actions**: Use `accent-rose` for delete buttons, error states
4. **Success states**: Use `primary-soft` for positive feedback
5. **Neutral UI**: Use Tailwind's `slate-*` scale for borders, muted text, dividers

---

## 4. Typography

| Role        | Font                | Weights    | Tailwind Class  | Usage                           |
| ----------- | ------------------- | ---------- | --------------- | ------------------------------- |
| **Body**    | Be Vietnam Pro      | 300–800    | `font-sans`     | All body text, UI labels, forms |
| **Display** | Plus Jakarta Sans   | 400–800    | `font-display`  | Hero headings, section titles   |

### Rules

- Fonts are imported **once** in `resources/css/app.css`. Never import Google Fonts in Vue components.
- **Forbidden fonts**: Inter, Roboto, Arial, system defaults — these make the UI look generic.
- Headings hierarchy: `text-7xl` (hero) → `text-5xl` (section) → `text-xl` (card) → `text-lg` (subsection).
- Always pair font size with appropriate `leading-*` and `tracking-*`.

---

## 5. Component Architecture

### 5.1 Directory Structure

```
resources/js/components/
└── ui/                    ← Shared, design-system-level components
    ├── VBtn.vue           ← Universal button / link
    ├── VBadge.vue         ← Pill badge label
    ├── VNavbar.vue        ← Floating pill navbar
    ├── VTestimonialCard.vue
    ├── VPricingCard.vue
    ├── VCoachCard.vue
    └── VFooter.vue
```

When building **new features** (dashboard, admin), add components to the appropriate directory:

```
resources/js/components/
├── ui/                    ← Design-system primitives (shared everywhere)
├── dashboard/             ← Dashboard-specific composed components
└── admin/                 ← Admin-specific composed components
```

### 5.2 Component Catalog

#### VBtn — Universal Button

The **single source of truth** for every CTA, action button, and link across the entire app.

```vue
<VBtn variant="primary" href="#harga" size="lg">Lihat Paket</VBtn>
<VBtn variant="outline" :to="{ name: 'login' }">Login</VBtn>
<VBtn variant="ghost" :to="{ name: 'settings' }">Settings</VBtn>
<VBtn variant="white" href="https://wa.me/..." external>Hubungi</VBtn>
```

| Prop       | Type             | Default     | Values                                  |
| ---------- | ---------------- | ----------- | --------------------------------------- |
| `variant`  | String           | `'primary'` | `primary`, `outline`, `ghost`, `white`  |
| `size`     | String           | `'md'`      | `sm`, `md`, `lg`                        |
| `href`     | String           | `null`      | Renders as `<a>`                        |
| `to`       | String / Object  | `null`      | Renders as `<router-link>`              |
| `external` | Boolean          | `false`     | Adds `target="_blank"` when using `href`|

> **Rule**: Never use raw `<a>` or `<button>` for actions. Always use `<VBtn>`.

#### VBadge — Pill Label

```vue
<VBadge>Label Text</VBadge>
<VBadge color="rose">BEST SELLER</VBadge>
```

#### VNavbar, VFooter — Page Shell

Used on all public-facing pages. Accept `links` prop for data-driven navigation.

#### VTestimonialCard, VPricingCard, VCoachCard — Domain Cards

Accept data via props, handle their own layout internally.

### 5.3 Creating New Components

When you need a new UI element:

1. **Check if an existing component can be extended** (e.g., add a new `variant` to VBtn)
2. **If new**: create in `components/ui/` with the `V` prefix
3. **Props in, events out** — components never fetch data or manage routes
4. **Use Tailwind tokens** — never hardcode colors or spacing
5. **No `<style>` blocks** unless absolutely necessary for encapsulation

---

## 6. Page Architecture Rules

### No `<style>` Blocks in Page Components

All styling comes from:
- Tailwind utility classes in templates
- Global utilities in `app.css` (`blob-shape`, `hero-gradient`, `hide-scrollbar`)
- Tailwind config tokens (`primary`, `surface-alt`, `rounded-card-lg`)

### Data Stays in Pages

Pages own the data (in `<script setup>`) and pass it to components via props. Components are pure presentational.

### File Organization

```
resources/js/pages/
├── LandingPage.vue        ← Public: marketing/conversion
├── LoginPage.vue          ← Auth
├── PortalPage.vue         ← Authenticated: student portal
├── DashboardPage.vue      ← Future: admin dashboard
└── ...
```

---

## 7. Icon Policy

- **Library**: `lucide-vue-next` — the only allowed icon source
- **Import per-component**: only import the icons you need (tree-shaking)
- **Never** use inline `<svg>` elements in templates
- **Never** use emoji as UI icons (looks unprofessional)

```vue
import { ArrowRight, ShieldCheck } from 'lucide-vue-next';
```

---

## 8. Layout Patterns

### Public Pages (Landing, Pricing, About)

| Pattern               | Implementation                                              |
| --------------------- | ------------------------------------------------------------ |
| Floating pill navbar  | `VNavbar` — `bg-white/70 backdrop-blur-xl rounded-pill`     |
| Blob decorations      | `.blob-shape` class on absolutely positioned `div`s         |
| Section alternation   | `bg-surface` → `bg-surface-alt` → `bg-white` rhythm        |
| Hero split layout     | `flex flex-col md:flex-row` with 60/40 text-image split     |
| Pre-footer CTA card   | Full-width rounded card with gradient + image overlay        |

### Dashboard / Admin Pages

| Pattern               | Implementation                                               |
| --------------------- | ------------------------------------------------------------ |
| Sidebar navigation    | Fixed left, `bg-surface-alt`, active state = `text-primary`  |
| Content area          | `bg-white rounded-card-lg shadow-sm` cards in grid           |
| Data tables           | Alternating `bg-surface-alt` rows, `border-slate-100`        |
| Form inputs           | `border border-slate-200 rounded-card` with focus ring       |
| Action buttons        | `<VBtn variant="primary" size="sm">` in toolbars             |
| Status badges         | `<VBadge color="primary">Active</VBadge>`                    |

---

## 9. Motion Rules

| Type              | Where                              | Duration  | Easing        |
| ----------------- | ---------------------------------- | --------- | ------------- |
| Hover scale       | Buttons, CTAs                      | 150ms     | ease-out      |
| Hover lift        | Cards (`-translate-y-2`)           | 300ms     | ease-out      |
| Grayscale toggle  | Coach cards                        | 500ms     | ease-in-out   |
| Dropdown enter    | Mobile nav (Vue `<Transition>`)    | 200ms     | ease-out      |
| Dropdown leave    | Mobile nav                         | 150ms     | ease-in       |
| Smooth scroll     | Carousel `scrollBy()`             | native    | —             |

### Motion Anti-Patterns (Forbidden)

- Micro-animation spam
- Loading spinners on static content
- Parallax scrolling
- Auto-playing carousels
- Bounce animations on important content

---

## 10. Responsive Breakpoints

Follow Tailwind defaults: `sm` (640px), `md` (768px), `lg` (1024px), `xl` (1280px).

| Breakpoint | Landing Page Behavior                                         |
| ---------- | ------------------------------------------------------------- |
| Mobile     | Single column, stacked hero, hamburger nav, full-width cards  |
| Tablet+    | Two-column hero, horizontal pricing grid, pill navbar visible |
| Desktop    | Max-width `7xl` (1280px) container, 4-col pricing grid       |

---

## 11. Accessibility Baseline

- All interactive elements must have visible `:focus` states
- Color contrast: minimum WCAG AA (4.5:1 for text)
- All images need descriptive `alt` text
- Buttons must have clear labels (not just icons)
- Keyboard-navigable: tabs, enter, escape for dropdowns

---

## 12. Anti-Patterns (Forbidden)

- Inter / Roboto / Arial fonts
- Raw hex colors in templates
- Inline SVGs instead of Lucide components
- Emoji as functional icons
- `<style>` blocks in page components
- Duplicated button/link markup (use `<VBtn>`)
- Tailwind default look without design token customization
- Symmetrical generic landing page layouts
- Component-first development without understanding the design direction
- Random decorative animations

---

## 13. Development Checklist

Before merging any UI work:

- [ ] No raw hex values in templates (use Tailwind token names)
- [ ] No inline SVGs (use Lucide components)
- [ ] No Google Font imports in Vue files (global `app.css` only)
- [ ] No `<style>` blocks in page files
- [ ] All CTAs use `<VBtn>` (not raw `<a>` or `<button>`)
- [ ] Colors come from `tailwind.config.js` tokens
- [ ] New component follows `V` naming prefix, lives in `components/ui/`
- [ ] Visual tested on mobile (375px) and desktop (1440px)
- [ ] Hover states present on all interactive elements
- [ ] Accessible focus states on interactive elements

