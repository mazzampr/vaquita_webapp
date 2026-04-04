# Requirement Website - Sistem Kelola Les Renang

## 1. Tujuan Produk
- Membangun website untuk mengelola operasional les renang (jadwal, siswa, pelatih, absensi, pembayaran, laporan).
- Mendukung akses cepat dari perangkat mobile dan desktop melalui PWA.
- Menyediakan dashboard untuk admin dan pelatih, serta portal informasi untuk siswa/orang tua.

## 2. Stack Teknologi (Wajib)
- Backend: Laravel 11
- Frontend: Vue 3
- Database: MySQL
- UI: Tailwind CSS
- Authentication: Laravel Sanctum
- PWA: `eramitgupta/laravel-pwa` (Service Worker + Web App Manifest + installable app)
- API: RESTful API dengan JSON response
- Package:
  - Laravel Sanctum untuk manajemen token dan otentikasi API
  - laravel/breeze (Vue + Vite) untuk bootstrap auth UI awal
  - spatie/laravel-permission untuk manajemen role dan permission yang fleksibel
  - eramitgupta/laravel-pwa untuk fitur PWA yang terintegrasi Laravel
  - barryvdh/laravel-dompdf untuk generate laporan PDF yang rapi
  - laravel/telescope untuk debugging dan monitoring aplikasi selama pengembangan
