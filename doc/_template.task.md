# Template Task Log

Gunakan template ini untuk setiap task yang mulai dikerjakan.
Simpan sebagai: `doc/task/YYYY-MM-DD-nama-task.task.md`.

## 0. Metadata Singkat
- Feature ID:
- Task Log ID: `YYYY-MM-DD-nama-task`
- Prioritas: `High` | `Medium` | `Low`
- Status: `Planned` | `Ready` | `In Progress` | `Done` | `Blocked`
- Owner:
- Sumber fitur: `doc/fitur/fitur.md`
- Referensi daftar pekerjaan: `doc/task.md`

## 1. Ringkasan Task
- Judul:
- Tujuan bisnis:
- Scope fitur:
- Out of scope:

## 2. Detail Requirement
> Untuk task fitur, bagian Backend dan Frontend wajib diisi dan dikerjakan. Boleh isi "Tidak relevan" hanya untuk task teknis `TECH-*`.

### Backend (Laravel)
- Endpoint:
- Method:
- Request payload:
- Validation rules:
- Business rules:
- Response format:
- Error cases (`401/403/404/422/500`):

### Frontend (Vue + Tailwind + PWA)
- Halaman/komponen terdampak:
- Perubahan UI utama:
- State yang dibutuhkan:
- Integrasi API:
- Modal konfirmasi:
  - Create:
  - Update:
  - Delete:
- Modal sukses:
  - Create:
  - Update:
  - Delete:
- Loading state:
- Empty state:
- Error state:
- Catatan implementasi PWA:
  - Paket: `eramitgupta/laravel-pwa`
  - Manifest/icon/splash/Service Worker terkonfigurasi

## 3. Kontrak Data
- Field yang digunakan:
- Enum/status:
- Format pagination:
- Mapping error backend ke UI:

## 4. Non-Functional Requirement
- Security:
- Performance:
- Logging/monitoring:
- PWA/offline behavior (jika relevan):

## 5. Batasan dan Asumsi
- Batasan teknis:
- Dependency:
- Asumsi:

## 6. Testing Minimum
### Backend
- [ ] Feature test endpoint utama
- [ ] Validasi request test (`422`)
- [ ] Authorization test (`401/403`)

### Frontend
- [ ] Loading state teruji
- [ ] Empty state teruji
- [ ] Error state teruji
- [ ] Integrasi API success + fail teruji

## 7. Definition of Done
- [ ] Requirement terpenuhi
- [ ] Backend/API selesai dan terhubung ke data/logic yang benar
- [ ] Frontend/UI selesai dan terhubung ke API
- [ ] Modal konfirmasi tersedia untuk setiap aksi create/update/delete
- [ ] Modal sukses tersedia untuk setiap aksi create/update/delete
- [ ] State loading/empty/error frontend tersedia
- [ ] Kode mengikuti `doc/standard-code.md`
- [ ] Test/lint/check relevan lulus
- [ ] Tidak ada regression yang diketahui
- [ ] Dokumentasi di-update (jika perlu)

## 8. Output yang Diminta ke AI
- Struktur file
- Kode final lengkap
- Penjelasan singkat keputusan teknis
- Catatan asumsi

## 9. Log Pengerjaan
### YYYY-MM-DD
- Status:
- Perubahan:
- Test/check:
- Catatan:

