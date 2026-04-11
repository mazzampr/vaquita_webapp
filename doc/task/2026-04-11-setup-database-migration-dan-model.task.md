# Task: Setup Database Migration dan Model

## 0. Metadata Singkat
- Feature ID: `TECH-001`
- Task Log ID: `2026-04-11-setup-database-migration-dan-model`
- Prioritas: `High`
- Status: `Done`
- Owner: -
- Sumber fitur: `doc/fitur/fitur.md`
- Referensi daftar pekerjaan: `doc/task.md`

## 1. Ringkasan Task
- Judul: Setup Database Migration dan Model
- Tujuan bisnis: Menyediakan struktur data awal agar fitur operasional les renang bisa dibangun di atas skema database dan model Laravel yang konsisten.
- Scope fitur:
  - Membuat migration untuk role, pivot user-role, profil siswa, profil pelatih, lokasi kolam, kelas, jadwal, sesi, langganan, absensi, pendaftaran, invoice, pembayaran, finance, payroll, rapor, evaluasi, lomba, audit log, dan notifikasi.
  - Membuat model Laravel untuk entitas domain utama.
  - Menyediakan base model `ModelIndonesia` dan `ModelIndonesiaSoftDelete`.
- Out of scope:
  - Implementasi endpoint CRUD.
  - Implementasi UI.
  - Seeder data lengkap.
  - Policy/authorization detail.

## 2. Detail Requirement
### Backend (Laravel)
- Endpoint: Tidak ada endpoint baru.
- Method: Tidak relevan.
- Request payload: Tidak relevan.
- Validation rules: Tidak relevan.
- Business rules:
  - Struktur tabel harus mendukung role user, data siswa/pelatih, kelas, jadwal, kehadiran, invoice, pembayaran, finance, gaji, rapor, evaluasi, lomba, audit, dan notifikasi.
  - Model harus mengikuti naming dan struktur Laravel yang dipakai project.
- Response format: Tidak relevan.
- Error cases (`401/403/404/422/500`): Tidak relevan untuk task migration/model.

### Frontend (Vue + Tailwind + PWA)
- Halaman/komponen terdampak: Tidak ada.
- Perubahan UI utama: Tidak ada.
- State yang dibutuhkan: Tidak ada.
- Integrasi API: Tidak ada.
- Loading state: Tidak ada.
- Empty state: Tidak ada.
- Error state: Tidak ada.
- Catatan implementasi PWA: Tidak ada.

## 3. Kontrak Data
- Field yang digunakan: Mengikuti migration di `database/migrations/`.
- Enum/status: Mengikuti kebutuhan domain di masing-masing migration.
- Format pagination: Tidak relevan.
- Mapping error backend ke UI: Tidak relevan.

## 4. Non-Functional Requirement
- Security: Relasi user, role, audit, dan status akun disiapkan sebagai fondasi authorization dan monitoring.
- Performance: Index/foreign key mengikuti kebutuhan relasi awal migration.
- Logging/monitoring: Struktur `log_audit` dan `notifikasi` disiapkan.
- PWA/offline behavior: Tidak relevan.

## 5. Batasan dan Asumsi
- Batasan teknis:
  - Menggunakan migration Laravel.
  - Menggunakan model Eloquent.
- Dependency:
  - Struktur `users` dan auth dasar sudah tersedia.
- Asumsi:
  - Detail business rule endpoint akan ditambahkan di task fitur berikutnya.
  - Relasi model bisa diperluas saat implementasi fitur domain berjalan.

## 6. Testing Minimum
### Backend
- [ ] Jalankan migration dari database kosong.
- [ ] Cek foreign key dan relasi tabel kritikal.
- [ ] Cek model bisa di-autoload oleh Laravel.

### Frontend
- [x] Tidak relevan untuk task ini.

## 7. Definition of Done
- [x] Migration domain utama tersedia.
- [x] Model domain utama tersedia.
- [x] Base model `ModelIndonesia` dan `ModelIndonesiaSoftDelete` tersedia.
- [ ] Test/check migration dicatat setelah dijalankan ulang.
- [x] Dokumentasi task log dibuat.

## 8. Output yang Diminta ke AI
- Struktur file migration dan model.
- Catatan relasi penting.
- Catatan asumsi.

## 9. Log Pengerjaan
### 2026-04-11
- Status: `Done`
- Perubahan: Migration dan model domain utama sistem sudah dibuat di `database/migrations/` dan `app/Models/`.
- Test/check: Belum dijalankan ulang pada sesi dokumentasi ini.
- Catatan: Task ini dicatat sebagai task teknis selesai untuk fondasi database dan model.
