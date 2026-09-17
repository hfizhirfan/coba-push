# 🌿 Brows by Veron — Luxury PMU & Brow Studio

Landing page WordPress kustom untuk **Brows by Veron** — studio kecantikan spesialis *Permanent Makeup (PMU)*, *Microblading*, dan *Nano Brows*.

---

## 📌 Tentang Project

Website ini dirancang sebagai landing page eksklusif dan profesional untuk menampilkan layanan studio, portofolio hasil treatment, daftar harga, testimoni klien, serta integrasi pemesanan konsultasi / appointment.

### 🎨 Desain & UI/UX
- **Palette:** Luxury Warm Tone & Neutral Brochure Palette
- **Typography:** *Plus Jakarta Sans*, *Poppins*
- **Fitur Khusus:** Modern Glassmorphism navigation, fast-loading static assets, responsive mobile-first layout.

---

## 🛠️ Tech Stack & Requirements

- **CMS:** WordPress (v6.0+)
- **PHP:** 7.4 / 8.0+
- **Database:** MySQL 5.7+ / MariaDB 10.3+
- **Web Server:** Nginx / Apache (Laragon environment)
- **Custom Theme:** `corporate_blueprint-template` (Brows by Veron Theme)

---

## 🚀 Panduan Instalasi Lokal (Laragon / XAMPP)

1. **Clone Repository**
   ```bash
   git clone https://github.com/<USERNAME>/browsbyveron-wordpress.git
   ```

2. **Setup Database**
   - Buat database baru di MySQL (misal: `browsbyveron_db`).
   - Import file database `.sql` terbaru (jika ada).

3. **Konfigurasi `wp-config.php`**
   - Salin file `wp-config-sample.php` menjadi `wp-config.php`:
     ```bash
     cp wp-config-sample.php wp-config.php
     ```
   - Sesuaikan konfigurasi database Anda:
     ```php
     define( 'DB_NAME', 'browsbyveron_db' );
     define( 'DB_USER', 'root' );
     define( 'DB_PASSWORD', '' );
     define( 'DB_HOST', 'localhost' );
     ```

4. **Jalankan Web Server**
   - Buka project melalui virtual host local (contoh: `http://browsbyveron-wordpress.test` atau `http://localhost/browsbyveron-wordpress`).

---

## 📁 Struktur Folder Utama

```text
browsbyveron-wordpress/
├── wp-admin/              # File Core WordPress Admin
├── wp-includes/           # File Core WordPress Libraries
├── wp-content/
│   ├── themes/
│   │   └── corporate_blueprint-template/   # Tema Kustom Brows by Veron
│   ├── plugins/          # Plugin WordPress
│   └── uploads/          # Media & Gambar (di-ignore oleh git)
├── .gitignore             # Konfigurasi file yang diabaikan git
├── README.md              # Dokumentasi project
└── wp-config-sample.php   # Template konfigurasi database
```

---

## 📄 Lisensi

Project ini dikembangkan untuk **Brows by Veron**. Semua hak cipta konten dan aset merek dilindungi.

