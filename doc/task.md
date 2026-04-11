# Task List

Dokumen ini adalah daftar pekerjaan yang diambil dari master fitur.
Detail pengerjaan tiap task disimpan sebagai task log di folder `doc/task/`.

## Alur Dokumen
- `doc/fitur/fitur.md`: master semua fitur sistem.
- `doc/task.md`: daftar pekerjaan, status, dan pointer ke task log.
- `doc/task/YYYY-MM-DD-nama-task.task.md`: log/detail pengerjaan satu task.
- `doc/_template.task.md`: template untuk membuat task log baru.

## Status
- `Planned`: task sudah masuk daftar, belum mulai.
- `Ready`: requirement awal cukup dan siap dikerjakan.
- `In Progress`: task sedang dikerjakan dan task log sudah dibuat.
- `Done`: task selesai, task log sudah diupdate.
- `Blocked`: task tertahan dependency atau keputusan.

## Aturan
1. Ambil pekerjaan dari `doc/fitur/fitur.md`.
2. Catat pekerjaan di `doc/task.md`.
3. Saat mulai mengerjakan, buat task log di `doc/task/` dengan format `YYYY-MM-DD-nama-task.task.md`.
4. Saat task selesai, update status di `doc/task.md` menjadi `Done`.
5. Task log wajib ikut diupdate dengan hasil pengerjaan, test/check yang dijalankan, dan catatan sisa jika ada.
6. Setiap task fitur wajib mencakup backend dan frontend sampai usable di aplikasi, kecuali task dengan ID `TECH-*`.
7. Jika task terlalu besar untuk dikerjakan aman dalam satu iterasi, pecah menjadi task backend/API, frontend/UI, dan integration/hardening, tetapi tetap tulis dependency-nya di catatan.
8. Setiap aksi create, update, dan delete wajib memakai modal konfirmasi sebelum request dikirim dan modal sukses setelah request berhasil.

## Format Nama Task Log
```txt
doc/task/YYYY-MM-DD-nama-task.task.md
```

Contoh:
```txt
doc/task/2026-04-11-user-management-list-search-pagination.task.md
```

## Daftar Pekerjaan
| ID | Pekerjaan | Prioritas | Status | Task Log | Catatan |
|---|---|---|---|---|---|
| FEAT-026 | Setup Repository + Landing Page + Login (MVP) | High | Done | `doc/task/2026-04-05-repo-setup-landing-login.task.md` | Fondasi project, landing page, login API, Vue, dan PWA dasar selesai |
| TECH-001 | Setup Database Migration dan Model | High | Done | `doc/task/2026-04-11-setup-database-migration-dan-model.task.md` | Migration dan model domain utama sistem sudah dibuat |
| FEAT-001 | User Management List + Search + Pagination | High | Planned | - | Ditunda setelah fondasi repo + auth awal siap |
| FEAT-002 | RBAC Multi-Role (Super Admin, Admin, Pelatih, Siswa) | High | Planned | - | Super Admin mewarisi akses Admin + Finance eksklusif |
| FEAT-003 | Super Admin Dashboard & Executive Summary | High | Planned | - | KPI bisnis, sesi hari ini, stagnasi siswa lintas pelatih |
| FEAT-004 | Finance Pemasukan & Rekap Pembayaran Otomatis | High | Planned | - | Auto posting dari pembayaran paket yang di-acc admin + input pemasukan manual |
| FEAT-005 | Piutang, Invoice History, dan Export Pemasukan | High | Planned | - | Pending payment, histori invoice, export PDF/Excel |
| FEAT-006 | Payroll Pelatih Otomatis Berbasis Absensi GPS | High | Planned | - | Tarif per jumlah siswa/sesi + potongan telat otomatis |
| FEAT-007 | Fixed Cost & Variable Cost Management | Medium | Planned | - | Input dan rekap biaya operasional bulanan |
| FEAT-008 | Cashflow, P&L, dan Laporan Keuangan | High | Planned | - | Tren 6/12 bulan, breakdown kategori, export PDF |
| FEAT-009 | Admin Pendaftaran Siswa Baru & Verifikasi | High | Planned | - | Approve/reject pendaftaran, generate invoice awal |
| FEAT-010 | Admin Manajemen Akun Siswa & Paket | High | Planned | - | Database siswa, detail histori, suspend, perpanjangan |
| FEAT-011 | Paket Keluarga & Multi-Akun Orang Tua | Medium | Planned | - | Daftar 2/4 anggota, akun terpisah, visibilitas progress |
| FEAT-012 | Admin Manajemen Jadwal, Slot, dan Kapasitas | High | Planned | - | Assign/pindah siswa, kuota pelatih, kalender mingguan/bulanan |
| FEAT-013 | Master Data Kolam & Validasi Radius GPS | High | Planned | - | CRUD lokasi kolam, radius validasi absensi |
| FEAT-014 | Master Data Paket Langganan | Medium | Planned | - | CRUD paket, harga, kuota sesi, durasi |
| FEAT-015 | Admin Manajemen Pelatih & Rekap Kehadiran | High | Planned | - | CRUD pelatih, rekap hadir/telat/tidak hadir, potongan manual |
| FEAT-016 | Monitoring Progress Siswa & Deteksi Stagnan | High | Planned | - | Perbandingan level bulan ini vs bulan lalu, filter pelatih |
| FEAT-017 | Portal Pelatih: Jadwal Mengajar & Histori Sesi | High | Planned | - | Jadwal harian/mingguan, detail siswa per sesi |
| FEAT-018 | Portal Pelatih: Absensi GPS per Siswa | High | Planned | - | Start kelas, GPS + timestamp wajib, checklist hadir/tidak |
| FEAT-019 | Portal Pelatih: Rapot Bulanan Siswa | High | Planned | - | Input level, catatan narasi, reminder akhir bulan |
| FEAT-020 | Portal Pelatih: Rapot 6 Bulanan | Medium | Planned | - | Hanya siswa aktif 6 bulan berturut-turut |
| FEAT-021 | Portal Pelatih: Info Gaji Pribadi & Slip Historis | Medium | Planned | - | Estimasi gaji berjalan, detail potongan, histori slip |
| FEAT-022 | Portal Siswa: Pendaftaran, Invoice, dan Upload Bukti | High | Planned | - | Registrasi, pilih paket, transfer manual, status verifikasi |
| FEAT-023 | Portal Siswa: Beranda Kuota, Jadwal, dan Histori | High | Planned | - | Sisa kuota, sesi berikutnya, histori kehadiran |
| FEAT-024 | Portal Siswa: Progress, Rapot, dan Grafik Level | Medium | Planned | - | Rapot bulanan/6 bulanan + visual perkembangan |
| FEAT-025 | Portal Siswa: Perpanjangan Langganan & Histori Transaksi | High | Planned | - | Pilih paket, upload bukti, aktivasi setelah acc admin |
| FEAT-027 | Auth Reset Password dan Session Timeout | Medium | Planned | - | Reset password + session timeout 8 jam untuk semua role |
| FEAT-028 | Competition Management Multi-Role | Medium | Planned | - | Event, nomor lomba, peserta, hasil, histori, export, akses admin/pelatih/siswa |
| FEAT-029 | Evaluasi Triwulan dan Insight Pelatih | Medium | Planned | - | Generate evaluasi, siswa stagnan, filter pelatih/level, insight, export |
| FEAT-030 | Admin Manajemen Kelas Reguler dan Keluarga | High | Planned | - | CRUD kelas, tipe/level/kapasitas, assign siswa/pelatih, grup keluarga, invoice grup |
| FEAT-031 | User Management CRUD, Status, Audit, dan Assignment | High | Planned | - | Create/edit user, reset password user, status akun, audit log, upload foto, assign pelatih ke lokasi/kelas |

## Prompt Mulai Task
```md
Ambil task dari `doc/task.md`:
- ID: <ID>
- Pekerjaan: <Nama task>

Buat task log dari `doc/_template.task.md`.
Simpan sebagai `doc/task/YYYY-MM-DD-nama-task.task.md`.
Update status task di `doc/task.md` menjadi `In Progress`.
Pastikan scope task mencakup backend dan frontend sampai bisa dipakai di aplikasi, kecuali task `TECH-*`.
```

## Prompt Selesai Task
```md
Task sudah selesai:
- ID: <ID>
- Task log: `doc/task/YYYY-MM-DD-nama-task.task.md`

Update status task di `doc/task.md` menjadi `Done`.
Update task log dengan hasil pengerjaan, test/check, dan catatan sisa.
```
