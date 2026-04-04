# Feature List

Daftar semua fitur yang akan dikerjakan.
Setiap fitur yang mulai dikerjakan wajib punya file task sendiri di `doc/task/`.

## Status
- `Planned`: ide sudah tercatat, belum siap dikerjakan
- `Ready`: requirement awal cukup, siap dibuat task detail
- `In Progress`: task file sudah dibuat dan sedang dikerjakan
- `Done`: fitur selesai
- `Blocked`: ada dependency/blocker

## Prioritas
- `High`
- `Medium`
- `Low`

## Backlog
| ID | Feature | Prioritas | Status | Task File | Catatan |
|---|---|---|---|---|---|
| FEAT-026 | Setup Repository + Landing Page + Login (MVP) | High | Done | `doc/task/repo-setup-landing-login.task.md` | Bootstrap project, landing page, login API + Vue + PWA dasar selesai |
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

## Rules
1. Jangan ubah status ke `In Progress` sebelum task file dibuat.
2. Field `Task File` wajib diisi saat status `In Progress` atau `Done`.
3. Satu baris backlog mewakili satu fitur, bukan sub-task teknis.
