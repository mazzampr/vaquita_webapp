# Standard Code Laravel + Vue + PWA

## Tujuan
Dokumen ini adalah standar detail implementasi untuk stack Laravel API + Vue + PWA.
Gunakan sebagai acuan kualitas utama saat membuat fitur baru, refactor, atau bugfix.

## Prinsip Umum
1. Kode harus benar, aman, dan mudah dirawat.
2. Pisahkan tanggung jawab: validasi, business logic, query, dan presentation.
3. Hindari duplikasi logic.
4. Gunakan naming yang jelas dan konsisten.
5. Prioritaskan solusi sederhana yang tetap scalable.
6. Jangan hardcode nilai yang bisa dijadikan config, enum, constant, atau helper.
7. Selalu siapkan error handling, loading state, empty state, dan fallback.

## Backend Standard (Laravel)

### Arsitektur
- Controller: request/response flow saja
- FormRequest: validasi dan authorize
- Service/Action: business logic
- Repository/Query class: query kompleks
- Model: relasi, cast, scope, accessor/mutator ringan
- Resource: format response
- Enum/Constant: status, role, type

### Controller
- Harus tipis
- Tidak memuat query kompleks
- Tidak memuat business flow panjang
- Gunakan constructor injection
- Gunakan early return

### Validasi
- Semua validasi di FormRequest
- Gunakan rule spesifik
- Gunakan `authorize()` untuk akses
- Beri custom message jika diperlukan

### Business Logic
Taruh di Service/Action untuk flow seperti:
- create/update/delete
- approval flow
- integrasi pihak ketiga
- kalkulasi status

### Query
- Gunakan scope/repository/query class untuk query kompleks
- Hindari N+1 (gunakan eager loading)
- Gunakan pagination untuk list
- Gunakan filter eksplisit
- Hindari raw query jika tidak perlu

### API Response
Format sukses:
```json
{
  "success": true,
  "message": "Data berhasil diambil",
  "data": {}
}
```

Format error:
```json
{
  "success": false,
  "message": "Validasi gagal"
}
```

### Security
- Validasi semua input
- Authorize semua endpoint sensitif
- Jangan expose field sensitif
- Sanitasi file upload
- Batasi mime/type/size upload
- Jangan hardcode secret/token/key

### Migration
- Nama tabel dan kolom jelas
- Gunakan foreign key jika relevan
- Tambahkan index untuk query yang sering dipakai
- Hindari struktur ambigu

## Frontend Standard (Vue + Tailwind + PWA)

### Arsitektur
Pisahkan folder:
- pages/views
- components
- composables
- services/api
- stores
- utils
- constants
- types
- public (asset statis PWA)

### Komponen
- Satu komponen satu tanggung jawab
- Hindari file terlalu besar
- Pindahkan logic reusable ke composable
- Props dan emits harus jelas

### Script
- Gunakan `script setup`
- Gunakan Composition API
- Gunakan TypeScript jika stack mendukung

### State Management
- Store hanya untuk state global/shared
- State lokal tetap di komponen/composable

### Integrasi API
- API call di service layer
- UI konsumsi service/composable
- Mapping response/error konsisten

### Form dan UX
- Form state jelas
- Disable submit saat loading
- Tampilkan error dengan rapi
- Support retry jika request gagal
- Wajib ada loading, empty, error state

### PWA
- Gunakan package `eramitgupta/laravel-pwa`
- Manifest valid
- Cache strategy jelas
- Data sensitif tidak di-cache sembarang
- Update app bisa terdeteksi user

## Integrasi Laravel + Vue

### API Contract
Backend dan frontend harus sinkron pada:
- field name
- enum/status
- pagination format
- error format
- filter/sort parameter

### Authentication
- Token handling aman
- Refresh flow jelas
- Unauthorized redirect jelas
- Role/permission check tidak hanya di frontend

### Error Mapping
Frontend harus bisa mapping:
- 401 unauthorized
- 403 forbidden
- 404 not found
- 422 validation
- 500 server error

## Anti-Pattern (Hindari)
- Controller gemuk
- Validasi manual berulang di controller
- Query kompleks di komponen UI
- API call bercampur dengan UI logic besar
- Semua state dipaksa ke store
- Catch error tanpa handling/logging jelas

## Output AI Wajib
Saat generate kode, urutannya:
1. Ringkasan pendekatan (maks 5 poin)
2. Struktur file yang diubah/dibuat
3. Kode final lengkap
4. Asumsi singkat (jika ada)

## Definition of Done
- [ ] Requirement terpenuhi
- [ ] Struktur modular dan konsisten
- [ ] Validasi + business logic terpisah
- [ ] Query efisien
- [ ] Response API konsisten
- [ ] Loading/empty/error state tersedia
- [ ] Tidak expose data sensitif
- [ ] Lint/test/check relevan lulus
