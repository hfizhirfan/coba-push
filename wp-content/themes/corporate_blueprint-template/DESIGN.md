# DESIGN.md — MBS CCTV WordPress Theme

Panduan design system untuk frontend developer tema WordPress MBS CCTV.
Semua komponen menggunakan **Tailwind CSS (CDN)** dengan konfigurasi kustom.

---

## 1. Brand Identity

| Properti          | Nilai                                      |
| ----------------- | ------------------------------------------ |
| Nama Perusahaan   | PT. Media Bersama Sukses                   |
| Brand Name        | MBS CCTV                                   |
| Tagline           | Electronic Security System Company         |
| Bahasa Konten     | Bahasa Indonesia                           |
| Logo URL          | `https://mbs.growandbless.com/wp-content/uploads/2026/03/Logo-6.png` |
| Logo Height       | `h-10` (40px) — gunakan `w-auto` agar proporsional |

---

## 2. Color Palette

Didefinisikan di `functions.php` → Tailwind config `theme.extend.colors`.

| Token              | Hex         | Penggunaan                                       |
| ------------------ | ----------- | ------------------------------------------------ |
| `primary`          | `#e43a35`   | CTA button, link hover, badge, icon highlight    |
| `background-light` | `#f5f4f9`   | Background utama body (light mode)               |
| `background-dark`  | `#101622`   | Background utama body (dark mode)                |

### Warna Slate (Tailwind Default)

| Konteks                    | Class                                      |
| -------------------------- | ------------------------------------------ |
| Teks utama                 | `text-slate-900` / `dark:text-slate-100`   |
| Teks sekunder              | `text-slate-600` / `dark:text-slate-400`   |
| Teks tersier (label, hint) | `text-slate-400` / `text-slate-500`        |
| Border                     | `border-slate-200` / `dark:border-slate-800` |
| Background input           | `bg-slate-100` / `dark:bg-slate-800`       |
| Card background            | `bg-white` / `dark:bg-slate-800`           |

### Opacity & Tints

- Background tint primary: `bg-primary/10`, `bg-primary/20`
- Hover shadow: `hover:shadow-primary/25`
- Hover opacity: `hover:bg-primary/90`

---

## 3. Typography

| Properti         | Nilai                                           |
| ---------------- | ----------------------------------------------- |
| Font Family      | `Inter` via Google Fonts                        |
| Tailwind Token   | `font-display` → `["Inter", "sans-serif"]`      |
| Body Class       | `font-display`                                  |

### Skala Heading

| Elemen       | Class                                                  |
| ------------ | ------------------------------------------------------ |
| Hero H2      | `text-4xl lg:text-6xl font-black leading-[1.1] tracking-tight` |
| Section H2   | `text-3xl font-black`                                  |
| Card H3      | `text-xl font-bold`                                    |
| Subtitle     | `text-lg text-slate-600 leading-relaxed`               |
| Body text    | `text-sm text-slate-600 dark:text-slate-400`           |
| Label        | `text-xs font-bold text-slate-400 uppercase`           |
| Badge        | `text-xs font-bold uppercase tracking-wider`           |
| Nav link     | `text-sm font-semibold`                                |

### Aturan Font Weight

- `font-black` (900) — heading utama, nama brand
- `font-bold` (700) — subheading, card title, CTA button, contact info
- `font-semibold` (600) — nav link
- Default (400) — body text

---

## 4. Border Radius

Konfigurasi kustom — sengaja dikecilkan untuk kesan **profesional & solid**.

| Token         | Nilai       | Penggunaan                                |
| ------------- | ----------- | ----------------------------------------- |
| `DEFAULT`     | `0.125rem`  | —                                         |
| `rounded-sm`  | `0.1875rem` | —                                         |
| `rounded-md`  | `0.25rem`   | Button kecil, input, icon container, badge |
| `rounded-lg`  | `0.375rem`  | Card, CTA button, hero image, section card |
| `rounded-xl`  | `0.5rem`    | —                                         |
| `rounded-2xl` | `0.625rem`  | —                                         |
| `rounded-3xl` | `0.75rem`   | —                                         |
| `rounded-full`| `9999px`    | Badge pill, social icon circle             |

### Aturan Penggunaan

- **Card** → `rounded-lg`
- **Button CTA** → `rounded-lg` (besar) / `rounded-md` (kecil, nav)
- **Input field** → `rounded-md`
- **Hero image** → `rounded-lg`
- **Contact section wrapper** → `rounded-lg`
- **Badge/pill** → `rounded-full`
- **Social media icon** → `rounded-full`
- **Icon container** → `rounded-md`

---

## 5. Layout & Spacing

### Container

```
max-w-7xl mx-auto px-4 sm:px-6 lg:px-8
```

Semua section menggunakan container yang sama — **JANGAN** buat variasi lain.

### Section Padding

| Tipe Section          | Class            |
| --------------------- | ---------------- |
| Section utama         | `py-20`          |
| Hero section          | `py-16 lg:py-24` |
| Partner/client strip  | `py-12`          |
| Footer                | `py-16`          |

### Grid Patterns

| Komponen          | Grid Class                                          |
| ----------------- | --------------------------------------------------- |
| Hero              | `grid lg:grid-cols-2 gap-12 items-center`           |
| Solutions cards   | `grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6` |
| Product cards     | `grid grid-cols-2 md:grid-cols-3 gap-4 lg:gap-5`       |
| News articles     | `grid md:grid-cols-3 gap-8`                         |
| Footer columns    | `grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12` |
| Client logos      | `grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-8` |

### Spacing Internal

| Konteks            | Class        |
| ------------------ | ------------ |
| Section title → content | `mb-12` |
| Card padding       | `p-6`        |
| Contact padding    | `p-10 lg:p-16` |
| Stack items        | `space-y-8` / `space-y-6` / `space-y-4` |

---

## 6. Component Patterns

### 6.1 Button — Primary CTA

```html
<a class="bg-primary text-white px-8 py-4 rounded-lg font-bold flex items-center gap-2 hover:shadow-lg hover:shadow-primary/25 transition-all">
    Hubungi Kami <span class="material-symbols-outlined">arrow_forward</span>
</a>
```

### 6.2 Button — Secondary

```html
<a class="bg-slate-200 dark:bg-slate-800 text-slate-900 dark:text-white px-8 py-4 rounded-lg font-bold hover:bg-slate-300 dark:hover:bg-slate-700 transition-all">
    Lihat Produk
</a>
```

### 6.3 Button — Small (Nav/Login)

```html
<a class="bg-primary text-white px-5 py-2 rounded-md text-sm font-bold hover:bg-primary/90 transition-all">
    Masuk
</a>
```

### 6.4 Badge / Pill

```html
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider">
    <span class="material-symbols-outlined text-sm">verified</span> Distributor Resmi
</div>
```

### 6.5 Category Tag

```html
<span class="bg-primary/10 px-2 py-0.5 rounded text-xs font-bold text-primary">TEKNOLOGI</span>
```

### 6.6 Solution Card

```html
<div class="group relative overflow-hidden rounded-lg bg-white dark:bg-slate-800 shadow-sm border border-slate-200 dark:border-slate-700">
    <div class="h-48 w-full bg-slate-200" style="background-image: url('...'); background-size: cover;"></div>
    <div class="p-6">
        <h3 class="text-xl font-bold mb-2 group-hover:text-primary transition-colors">Title</h3>
        <p class="text-slate-600 dark:text-slate-400 text-sm">Description.</p>
    </div>
</div>
```

### 6.7 Product Category Card (Glass on Dark BG — link ke WooCommerce)

Section menggunakan single background image + dark overlay (`bg-slate-900/90`).
Setiap card adalah `<a>` yang link ke WooCommerce product category.

```html
<a href="<?php echo esc_url( $cat_url ); ?>"
   class="group relative bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 p-6 lg:p-8
          hover:bg-primary hover:border-primary hover:shadow-xl hover:shadow-primary/20
          transition-all duration-300 hover:-translate-y-1">
    <!-- Icon -->
    <div class="size-14 mb-5 bg-primary/20 rounded-lg flex items-center justify-center
                group-hover:bg-white/20 transition-all duration-300">
        <span class="material-symbols-outlined text-3xl text-primary group-hover:text-white">icon_name</span>
    </div>
    <!-- Content -->
    <h3 class="text-lg font-bold mb-2 group-hover:text-white">Title</h3>
    <p class="text-sm text-slate-400 leading-relaxed group-hover:text-white/80">Deskripsi singkat.</p>
    <!-- Arrow -->
    <div class="mt-4 flex items-center gap-1 text-sm font-semibold text-primary group-hover:text-white">
        <span>Lihat Produk</span>
        <span class="material-symbols-outlined text-lg group-hover:translate-x-1 transition-transform duration-300">arrow_forward</span>
    </div>
</a>
```

**Hover effect:** Seluruh card berubah background ke `primary`, naik `-translate-y-1`, shadow muncul.
**WooCommerce integration:** Gunakan `get_term_by('slug', $slug, 'product_cat')` + `get_term_link()`.

### 6.8 News Article Card

```html
<article class="space-y-4">
    <div class="aspect-video bg-slate-200 rounded-lg overflow-hidden" style="background-image: url('...'); background-size: cover;"></div>
    <div class="flex items-center gap-4 text-xs font-bold text-primary">
        <span>OKT 24, 2023</span>
        <span class="bg-primary/10 px-2 py-0.5 rounded">TEKNOLOGI</span>
    </div>
    <h3 class="text-xl font-bold leading-snug">Judul Artikel</h3>
    <p class="text-slate-600 dark:text-slate-400 text-sm line-clamp-2">Deskripsi singkat.</p>
</article>
```

### 6.9 Contact Info Row

```html
<div class="flex items-start gap-4">
    <div class="size-10 rounded-md bg-primary/10 flex items-center justify-center text-primary">
        <span class="material-symbols-outlined">call</span>
    </div>
    <div>
        <p class="text-xs font-bold text-slate-400 uppercase">Label</p>
        <p class="font-bold">Value</p>
    </div>
</div>
```

### 6.10 Social Media Icon

```html
<a class="size-10 bg-slate-100 dark:bg-slate-800 rounded-full flex items-center justify-center text-slate-600 dark:text-slate-400 hover:bg-primary hover:text-white transition-all" href="#">
    <span class="material-symbols-outlined text-xl">icon_name</span>
</a>
```

### 6.11 Input Field

```html
<input class="bg-slate-100 dark:bg-slate-800 border-none rounded-md pl-10 pr-4 py-2 text-sm focus:ring-2 focus:ring-primary w-64" placeholder="..." type="text">
```

---

## 7. Icon System

Menggunakan **Google Material Symbols Outlined**.

```html
<span class="material-symbols-outlined">icon_name</span>
```

### Icon yang Digunakan

| Icon                   | Konteks                |
| ---------------------- | ---------------------- |
| `security`             | Logo fallback          |
| `verified`             | Badge hero             |
| `arrow_forward`        | CTA button             |
| `chevron_right`        | Link "Semua Solusi"    |
| `search`               | Search input           |
| `menu`                 | Mobile hamburger       |
| `videocam`             | CCTV                   |
| `fingerprint`          | Access Control         |
| `emergency_home`       | Intrusion Alarm        |
| `local_fire_department`| Fire Alarm             |
| `campaign`             | Public Address         |
| `doorbell`             | Video Door Phone       |
| `call`                 | Telepon                |
| `mail`                 | Email                  |
| `chat`                 | WhatsApp               |
| `location_on`          | Alamat                 |
| `send`                 | Submit email           |
| `share`                | Facebook               |
| `photo_camera`         | Instagram              |
| `public`               | LinkedIn               |

---

## 8. Dark Mode

Menggunakan **class-based** dark mode (`darkMode: "class"`).

### Pattern

Selalu sediakan varian `dark:` untuk:

- Background: `bg-white dark:bg-slate-800`
- Text: `text-slate-900 dark:text-slate-100`
- Text sekunder: `text-slate-600 dark:text-slate-400`
- Border: `border-slate-200 dark:border-slate-700`
- Input: `bg-slate-100 dark:bg-slate-800`

### Body

```html
<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100">
```

---

## 9. Hover & Transition Effects

| Komponen         | Efek                                                   |
| ---------------- | ------------------------------------------------------ |
| Nav link         | `hover:text-primary transition-colors`                 |
| CTA button       | `hover:shadow-lg hover:shadow-primary/25 transition-all` |
| Small button     | `hover:bg-primary/90 transition-all`                   |
| Card title       | `group-hover:text-primary transition-colors`           |
| Product card img | `group-hover:scale-105 transition-transform duration-300` |
| Product card border | `hover:border-primary/50 transition-all`            |
| Product icon box | `group-hover:bg-primary transition-all` + `group-hover:text-white` |
| Social icon      | `hover:bg-primary hover:text-white transition-all`     |
| Client logos     | `grayscale hover:grayscale-0 opacity-60 hover:opacity-100 transition-all duration-500` |
| Link text        | `hover:underline` / `hover:text-primary`               |

---

## 10. Header (Sticky Navigation)

```
sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b
```

- Tinggi: `h-16`
- Logo: `h-10 w-auto`
- Nav links: `hidden md:flex items-center gap-6`
- Search: `hidden lg:flex` (hanya desktop)
- Mobile menu: toggle `hidden` class via JS
- Login/Logout: conditional via `is_user_logged_in()`

---

## 11. Section Backgrounds

| Section            | Background                                         |
| ------------------ | -------------------------------------------------- |
| Body               | `bg-background-light`                              |
| Header             | `bg-white/80 backdrop-blur-md`                     |
| Hero               | Transparent (inherit body)                         |
| Partners           | `bg-white border-y border-slate-200`               |
| Solutions          | `bg-background-light`                              |
| Products           | `bg-slate-900 text-white`                          |
| News               | Transparent                                        |
| Contact            | `bg-slate-50`                                      |
| Footer             | `bg-white border-t border-slate-200`               |

---

## 12. WordPress Integration

### Template Hierarchy

```
front-page.php      → Homepage (merangkai semua template-parts)
index.php            → Blog listing fallback
header.php           → <html> hingga </header>
footer.php           → <footer> hingga </html>
searchform.php       → Custom search form
```

### Template Parts (`template-parts/`)

```
hero.php             → Hero section + CTA
partners.php         → Client logos grid
solutions.php        → 3-card solution grid
products.php         → 6-card product portfolio (dark bg)
news.php             → Latest posts (WP_Query) + static fallback
contact.php          → Contact info + Google Maps iframe
```

### Nav Menus (3 lokasi)

| Location           | Penggunaan                |
| ------------------ | ------------------------- |
| `primary`          | Header navigation         |
| `footer_links`     | Footer tautan cepat       |
| `footer_products`  | Footer produk             |

### Nav Walkers

- `MBSCCTV_Nav_Walker` — Untuk header nav, output flat `<a>` tanpa `<li>`
- `MBSCCTV_Footer_Nav_Walker` — Untuk footer, output `<li><a>` di dalam `<ul>`

### WordPress Functions yang Digunakan

- `get_header()` / `get_footer()` / `get_template_part()`
- `wp_head()` / `wp_footer()` / `wp_body_open()`
- `wp_nav_menu()` / `has_nav_menu()`
- `WP_Query` (news section)
- `the_post_thumbnail()` / `has_post_thumbnail()`
- `is_user_logged_in()` / `wp_login_url()` / `wp_logout_url()`
- `get_search_form()`
- `body_class()` / `language_attributes()`

---

## 13. Assets & External Resources

| Resource               | URL / Method                                    |
| ---------------------- | ----------------------------------------------- |
| Tailwind CSS           | CDN `cdn.tailwindcss.com` + plugins forms, container-queries |
| Google Fonts (Inter)   | `wp_enqueue_style` via Google Fonts API         |
| Material Symbols       | `wp_enqueue_style` via Google Fonts API         |
| Logo                   | External URL (mbs.growandbless.com)             |
| Product images         | External URL (mbs.growandbless.com)             |
| Client logos           | External URL (mbs.growandbless.com)             |
| Google Maps            | Embed iframe                                    |

---

## 14. Kontak Resmi

| Info       | Nilai                                        |
| ---------- | -------------------------------------------- |
| Telepon    | (031) 591-4700 / (031) 593-9337              |
| Fax        | (031) 596-3451                               |
| Email      | marketing@mbscctv.com                        |
| WhatsApp   | +62 816 532 727                              |
| Alamat     | Jl. Dharmahusada Utara No 22, Surabaya, Indonesia |
| Facebook   | @mbscctv                                     |
| Instagram  | @mbs_securitysystem                          |
| LinkedIn   | PT. Media Bersama Sukses                     |

---

## 15. Do's & Don'ts

### DO

- Gunakan token `primary` untuk semua aksen warna — JANGAN hardcode `#e43a35`
- Selalu sediakan `dark:` varian untuk background, text, dan border
- Gunakan `transition-all` atau `transition-colors` pada semua elemen interaktif
- Gunakan `group` + `group-hover:` untuk card hover effects
- Gunakan `max-w-7xl mx-auto px-4 sm:px-6 lg:px-8` untuk container
- Gunakan `rounded-lg` untuk card, `rounded-md` untuk button kecil & input
- Tulis konten dalam **Bahasa Indonesia**

### DON'T

- Jangan gunakan border radius besar (`rounded-2xl`, `rounded-3xl`) untuk card — kesan harus solid & profesional
- Jangan gunakan font selain **Inter**
- Jangan buat container custom — selalu gunakan pattern `max-w-7xl`
- Jangan skip `transition-*` pada hover state
- Jangan gunakan `rounded-full` kecuali untuk badge pill atau social icon
- Jangan hardcode warna — gunakan Tailwind token
