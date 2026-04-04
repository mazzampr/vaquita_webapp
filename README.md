# Sistem Kelola Les Renang

Aplikasi manajemen operasional les renang berbasis **Laravel 11 + Vue 3 + Tailwind + PWA**.

## Prasyarat
- PHP `>= 8.2`
- Composer `>= 2.x`
- Node.js `>= 20` dan npm
- MySQL `>= 8` (atau MariaDB kompatibel)

## Instalasi
1. Clone repository dan masuk ke folder project.
2. Install dependency backend:
   ```bash
   composer install
   ```
3. Install dependency frontend:
   ```bash
   npm install
   ```
4. Copy environment file:
   ```bash
   cp .env.example .env
   ```
   Untuk Windows PowerShell:
   ```powershell
   Copy-Item .env.example .env
   ```
5. Generate app key:
   ```bash
   php artisan key:generate
   ```
6. Atur koneksi database di file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=sistem_kelola_les_renang
   DB_USERNAME=root
   DB_PASSWORD=
   ```
7. Jalankan migrasi dan seed data awal:
   ```bash
   php artisan migrate --seed
   ```

## Menjalankan Project (Development)
### Opsi 1: Jalankan semua service sekaligus
```bash
composer run dev
```
Perintah ini akan menjalankan:
- Laravel server
- Queue listener
- Vite dev server

Catatan:
- Script `dev` sudah kompatibel Windows (tanpa `pail`).
- Jika environment Anda support `pcntl` (umumnya Linux/macOS), bisa pakai:
  ```bash
  composer run dev:with-logs
  ```

### Opsi 2: Jalankan terpisah
Terminal 1:
```bash
php artisan serve
```
Terminal 2:
```bash
npm run dev
```

## Akun Login Awal (Seeder)
Setelah `php artisan migrate --seed`, akun default:
- Email: `superadmin@lesrenang.test`
- Password: `password123`

## Build Production Asset
```bash
npm run build
```

## Menjalankan Test
```bash
php artisan test
```

## Endpoint Auth MVP
- `POST /api/auth/login`
- `POST /api/auth/logout`
- `GET /api/auth/me`
- `GET /api/health`

## Catatan PWA
Konfigurasi PWA ada di:
- `config/laravelpwa.php`
- `resources/views/vendor/laravelpwa/offline.blade.php`
