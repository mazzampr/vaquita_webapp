# Fitur Sistem Kelola Les Renang

Dokumen ini merangkum cakupan fitur utama per role.

## Global

### Authentication
- Register akun siswa
- Login semua role
- Logout
- Reset password
- Session timeout (8 jam)
- Role-based access control (RBAC)

## Super Admin (Owner)

### Dashboard
- View total siswa aktif
- View total pelatih aktif
- View total pendapatan bulan berjalan
- View jumlah sesi hari ini
- View grafik cashflow bulanan
- View ringkasan gaji pelatih
- View alert siswa stagnan
- Filter dashboard (bulan/tahun)

### Finance - Pemasukan
- Auto record pemasukan dari invoice
- Manual input pemasukan:
  - kategori
  - nominal
  - tanggal
  - keterangan
- View laporan pemasukan:
  - filter harian/mingguan/bulanan/tahunan
  - filter by paket
  - filter by lokasi
- View daftar invoice (lunas/pending/ditolak)
- Export laporan (PDF/Excel)

### Finance - Pengeluaran
- Auto generate gaji pelatih berdasarkan jumlah siswa hadir
- Auto potongan keterlambatan
- Manual potongan:
  - pilih pelatih
  - kategori
  - nominal
  - keterangan
- Input fixed cost (kategori, nominal)
- Input variable cost (kategori, nominal)
- View rekap pengeluaran

### Laporan Keuangan
- Generate laporan P&L
- View grafik cashflow (6-12 bulan)
- View breakdown pengeluaran (chart)
- Export laporan (PDF)

### Competition (Full Access)
- CRUD event lomba
- CRUD nomor lomba
- View semua peserta lomba
- View hasil lomba
- Export data lomba

### Evaluasi Triwulan
- Generate evaluasi otomatis
- View siswa stagnan
- Filter (pelatih, level)
- Insight per pelatih

### Kelola User
- View daftar user
- Filter user berdasarkan role
- Search user berdasarkan nama/email/no HP
- Create user Super Admin
- Create user Pelatih
- Edit data user
- Reset password user
- Aktifkan/nonaktifkan akun user
- View detail user
- Set role user
- Suspend akun user
- Reactivate akun user
- Audit log aktivitas user
- Validasi email/no HP user
- Upload foto profil user
- Assign pelatih ke lokasi tertentu
- Assign pelatih ke kelas tertentu
- Set status user (aktif/nonaktif/suspended)

## Admin

### Manajemen Siswa
- View list pendaftar baru
- View detail pendaftaran
- Approve pendaftaran
- Reject pendaftaran + alasan
- Auto generate invoice
- CRUD siswa:
  - data pribadi
  - status aktif/nonaktif
- View detail siswa:
  - histori paket
  - sisa kuota
  - histori absensi
  - histori rapor
- Approve pembayaran
- Reject pembayaran
- Manage paket keluarga (assign anggota)
- Suspend akun

### Manajemen Jadwal
- Create jadwal (pelatih, hari, jam, lokasi, kapasitas)
- Edit jadwal
- Delete jadwal
- Assign siswa ke jadwal
- Validasi kapasitas kelas
- Reschedule siswa
- View kalender (mingguan/bulanan)
- Filter (pelatih, lokasi, siswa)

### Manajemen Kelas
- Kelas reguler (A/B/C):
  - Create kelas
  - Tipe: Private/Semi/Swimming Class
  - Level: A/B/C
  - Assign siswa ke kelas
  - Set kapasitas kelas
  - Assign pelatih ke kelas
  - Manage jadwal kelas
- Kelas keluarga:
  - Create grup keluarga
  - Assign anggota
  - Generate 1 invoice untuk grup
  - View grup keluarga

### Manajemen Lokasi
- CRUD lokasi kolam
- Input alamat
- Set radius GPS
- Input Google Maps link

### Invoice & Pembayaran
- Generate invoice otomatis
- View list pembayaran pending
- Verifikasi bukti transfer
- Approve pembayaran
- Reject pembayaran
- Generate invoice PDF
- View histori invoice
- Filter (siswa, tanggal, status)

### Manajemen Pelatih
- CRUD pelatih
- Set status aktif/nonaktif
- View rekap kehadiran (hadir/terlambat/tidak hadir)
- Input potongan gaji
- View kalkulasi gaji

### Monitoring Progress
- View rapor semua siswa
- Filter per pelatih
- View rapor bulanan
- View rapor 6 bulanan
- Kirim reminder ke pelatih

### Competition Module
- Create/Edit/Delete event lomba
- Input nomor lomba
- Assign siswa ke lomba
- Assign nomor lomba ke siswa
- Input hasil lomba (waktu, prestasi, catatan)
- View histori lomba

### Evaluasi Triwulan
- Generate data triwulan
- View siswa stagnan (exclude IM3+)
- Filter per pelatih
- Export data

## Pelatih

### Jadwal
- View jadwal harian
- View jadwal mingguan
- View detail sesi (siswa, level)
- View histori sesi

### Absensi GPS
- Start sesi
- Validasi lokasi GPS
- Record timestamp + koordinat
- Checklist kehadiran siswa
- Submit absensi
- Auto hitung gaji
- Auto deteksi terlambat

### Rapor Bulanan
- Input level siswa
- Lock data setelah submit
- View histori rapor
- Reminder jika belum input

### Rapor 6 Bulanan
- View siswa eligible
- Input evaluasi
- Submit rapor

### Competition
- View siswa yang ikut lomba
- Input hasil lomba (waktu, prestasi, catatan)

### Info Gaji
- View estimasi gaji
- View detail potongan
- View histori slip gaji

## Siswa

### Pendaftaran
- Register akun
- Input data diri
- Pilih paket
- View invoice
- Upload bukti bayar
- Track status

### Dashboard
- View sisa kuota
- View jadwal berikutnya
- View histori kehadiran
- Reminder perpanjangan

### Progress
- View rapor bulanan
- View rapor 6 bulanan
- View grafik perkembangan

### Competition
- View histori lomba
- View hasil lomba (waktu, prestasi)

### Perpanjangan
- Pilih paket
- Upload pembayaran
- View histori transaksi
- Download invoice PDF
