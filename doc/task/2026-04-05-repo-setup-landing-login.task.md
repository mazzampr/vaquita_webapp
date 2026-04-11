# Task: Setup Repository + Landing Page + Login (MVP)

## 0. Metadata Singkat
- Feature ID: `FEAT-026`
- Task Log ID: `2026-04-05-repo-setup-landing-login`
- Prioritas: `High`
- Status: `Done`
- Owner: -

## 1. Ringkasan Task
- Judul: Setup Repository + Landing Page + Login (MVP)
- Tujuan bisnis: Menyediakan fondasi aplikasi yang bisa langsung diakses user (halaman publik) dan dipakai masuk sistem (login) sebelum fitur operasional lanjutan dikembangkan.
- Scope fitur:
  - Inisialisasi struktur project Laravel 11 + Vue 3 + Tailwind + konfigurasi environment dasar.
  - Setup PWA menggunakan package `eramitgupta/laravel-pwa`.
  - Setup koneksi frontend-backend via REST API.
  - Halaman landing publik (company profile singkat, CTA login/daftar).
  - Halaman login dengan autentikasi email + password.
  - Session/token login dasar dan redirect sesuai role (sementara rule sederhana).
- Out of scope (yang tidak dikerjakan):
  - Registrasi siswa penuh, pembayaran, invoice, dashboard bisnis, dan modul domain lainnya.
  - RBAC detail per menu (akan ditangani di FEAT-002).
  - Forgot/reset password.

## 2. Detail Requirement
### Backend (Laravel)
- Endpoint:
  - `POST /api/auth/login`
  - `POST /api/auth/logout`
  - `GET /api/auth/me`
  - `GET /api/health`
- Method:
  - `POST`, `GET`
- Request payload:
  - Login:
    - `email` (string, required)
    - `password` (string, required)
- Validation rules:
  - `email`: required, email:rfc
  - `password`: required, string, min:8
- Business rules:
  - Hanya akun aktif (`is_active = true`) yang boleh login.
  - Jika kredensial salah, return unauthorized.
  - Setelah login sukses, sistem mengembalikan token/session + profil ringkas user.
  - `me` hanya untuk user terautentikasi.
- Response format:
  - Sukses:
    - `success: true`
    - `message`
    - `data` (token/user)
  - Gagal:
    - `success: false`
    - `message`
    - `errors` (opsional, untuk 422)
- Error cases (401/403/404/422/500):
  - 401: email/password salah atau token invalid
  - 403: user tidak aktif
  - 404: endpoint tidak ditemukan
  - 422: validasi login gagal
  - 500: server error tak terduga

### Frontend (Vue + Tailwind + PWA)
- Halaman/komponen terdampak:
  - Public Landing Page (`/`)
  - Login Page (`/login`)
  - Auth store/composable
  - App router guard dasar
- Perubahan UI utama:
  - Landing: hero, ringkasan layanan, CTA ke login
  - Login: form email/password, tombol submit, area error message
- State yang dibutuhkan:
  - `authUser`, `authToken`, `isAuthenticated`
  - `loadingLogin`, `loginError`
- Integrasi API:
  - Submit login ke `POST /api/auth/login`
  - Simpan token aman (strategi sesuai standard-code)
  - Fetch `GET /api/auth/me` untuk kebutuhan data user login
- Loading state:
  - Tombol login disabled + indikator loading saat request berjalan
- Empty state:
  - Landing tetap tampil dengan konten default jika tidak ada data dinamis
- Error state:
  - Tampilkan pesan validasi field
  - Tampilkan pesan global ketika login gagal (401/403/500)
- Catatan implementasi PWA:
  - Gunakan `eramitgupta/laravel-pwa`
  - Setup manifest, icon, splash, dan service worker dari konfigurasi package, lalu integrasikan dengan build asset Vue

## 3. Kontrak Data
- Field yang digunakan:
  - User: `id`, `name`, `email`, `role`, `is_active`
  - Auth: `access_token`, `token_type`, `expires_at` (jika pakai expiry)
- Enum/status yang digunakan:
  - `role`: `super_admin`, `admin`, `coach`, `student`
  - `is_active`: `true/false`
- Format pagination:
  - Tidak relevan untuk task ini
- Mapping error backend ke UI:
  - 422 -> error per field di form
  - 401/403 -> toast/alert global di halaman login
  - 500 -> pesan fallback: "Terjadi kesalahan server, coba lagi"

## 4. Non-Functional Requirement
- Security:
  - Password disimpan hash (Laravel default)
  - Endpoint `me/logout` wajib auth middleware
  - Jangan expose detail stack trace ke frontend
- Performance:
  - TTI landing page < 3 detik di koneksi normal
  - Login API response target < 500ms (lokal/dev baseline)
- Logging/monitoring:
  - Log login gagal (tanpa menyimpan password)
  - Log error auth untuk troubleshooting
- PWA/offline behavior (jika relevan):
  - Landing tetap bisa diload dari cache dasar
  - Login memunculkan pesan jelas saat offline

## 5. Batasan dan Asumsi
- Batasan teknis:
  - Menggunakan stack wajib: Laravel 11 + Vue 3 + MySQL + Tailwind + `eramitgupta/laravel-pwa`
  - Tanpa payment gateway
- Dependency:
  - Ketersediaan database MySQL dev
  - Konfigurasi CORS untuk frontend-backend
- Asumsi yang dipakai:
  - Seed user awal minimal 1 `super_admin` untuk uji login
  - Mekanisme auth menggunakan Laravel Sanctum

## 6. Testing Minimum
### Backend
- [x] Feature test endpoint login success
- [x] Validasi request test (422 case)
- [x] Authorization test endpoint `me/logout` (401/403 case)

### Frontend
- [x] Loading state login teruji
- [x] Empty state landing teruji
- [x] Error state login teruji
- [x] Integrasi API login success + fail teruji

## 7. Definition of Done
- [x] Fitur sesuai requirement
- [x] Kode mengikuti `doc/standard-code.md`
- [x] Test/lint/check relevan lulus
- [x] Tidak ada regression yang diketahui
- [x] Dokumentasi singkat update (jika perlu)

## 8. Output yang Diminta ke AI
- Struktur file
- Kode final lengkap
- Penjelasan singkat keputusan teknis
- Catatan asumsi

## 9. Log Pengerjaan
### 2026-04-05
- Status: `Done`
- Perubahan: Fondasi project, landing page, login API, Vue, dan PWA dasar selesai.
- Test/check: Backend dan frontend check relevan untuk login, landing, dan auth state sudah ditandai selesai di checklist task.
- Catatan: Task ini menjadi fondasi awal sebelum fitur operasional lanjutan.
