# Desain Database - Sistem Kelola Les Renang

Dokumen ini memakai nama tabel dan kolom Bahasa Indonesia (format `snake_case`).

Konvensi penamaan:
- Primary key: `id_<nama_tabel>`
- Foreign key mengikuti nama PK tabel relasi
- Contoh: tabel `users` punya PK `id_users`, maka FK ke `users` memakai basis `id_users` (boleh tambah suffix konteks jika relasi ke tabel yang sama lebih dari satu kali)
- Kolom timestamp tetap: `created_at`, `updated_at`, `deleted_at`

## 1) Tabel Inti

### A. Pengguna dan Akses

#### `users`
- `id_users` (PK)
- `nama_lengkap`
- `email` (unique)
- `kata_sandi`
- `aktif`
- `email_terverifikasi_pada`
- `created_at`, `updated_at`, `deleted_at`

#### `roles`
- `id_roles` (PK)
- `nama_role` (unique)
- `deskripsi` (nullable)
- `aktif`
- `created_at`, `updated_at`, `deleted_at`

#### `user_role`
- `id_user_role` (PK)
- `id_users` (FK -> users.id_users)
- `id_roles` (FK -> roles.id_roles)
- `created_at`, `updated_at`

#### `profil_siswa`
- `id_profil_siswa` (PK)
- `id_users` (FK -> users.id_users, unique)
- `nomor_hp`
- `tanggal_lahir`
- `jenis_kelamin`
- `alamat`
- `kontak_darurat_nama`
- `kontak_darurat_hp`
- `catatan_medis`
- `created_at`, `updated_at`, `deleted_at`

#### `profil_pelatih`
- `id_profil_pelatih` (PK)
- `id_users` (FK -> users.id_users, unique)
- `nomor_hp`
- `tanggal_bergabung`
- `spesialisasi`
- `tipe_gaji_dasar` (per_sesi/per_siswa/fixed)
- `nominal_gaji_dasar`
- `created_at`, `updated_at`, `deleted_at`

#### `log_status_pengguna`
- `id_log_status_pengguna` (PK)
- `id_users` (FK -> users.id_users)
- `status_sebelum`
- `status_sesudah`
- `alasan`
- `id_users_pengubah` (FK -> users.id_users)
- `created_at`

### B. Data Master

#### `lokasi_kolam`
- `id_lokasi_kolam` (PK)
- `nama_lokasi`
- `alamat`
- `kota`
- `provinsi`
- `latitude`
- `longitude`
- `radius_meter`
- `tautan_google_maps`
- `aktif`
- `created_at`, `updated_at`, `deleted_at`

#### `paket_langganan`
- `id_paket_langganan` (PK)
- `nama_paket`
- `tipe_paket` (private/semi/swimming/family/special)
- `level` (A/B/C/NULL)
- `kuota_sesi`
- `durasi_hari`
- `harga`
- `aktif`
- `created_at`, `updated_at`, `deleted_at`

### C. Kelas, Jadwal, Kehadiran

#### `kelas`
- `id_kelas` (PK)
- `id_paket_langganan` (FK -> paket_langganan.id_paket_langganan)
- `nama_kelas`
- `tipe_kelas` (reguler/family/private/semi)
- `level`
- `kapasitas`
- `id_lokasi_kolam` (FK -> lokasi_kolam.id_lokasi_kolam)
- `id_users_pelatih` (FK -> users.id_users)
- `aktif`
- `created_at`, `updated_at`, `deleted_at`

#### `jadwal_kelas`
- `id_jadwal_kelas` (PK)
- `id_kelas` (FK -> kelas.id_kelas)
- `hari_ke`
- `jam_mulai`
- `jam_selesai`
- `created_at`, `updated_at`, `deleted_at`

#### `sesi_kelas`
- `id_sesi_kelas` (PK)
- `id_kelas` (FK -> kelas.id_kelas)
- `tanggal_sesi`
- `mulai_pada`
- `selesai_pada`
- `id_lokasi_kolam` (FK -> lokasi_kolam.id_lokasi_kolam)
- `id_users_pelatih` (FK -> users.id_users)
- `status_sesi` (terjadwal/berjalan/selesai/batal)
- `catatan`
- `created_at`, `updated_at`, `deleted_at`

#### `pendaftaran_kelas`
- `id_pendaftaran_kelas` (PK)
- `id_users_siswa` (FK -> users.id_users)
- `id_kelas` (FK -> kelas.id_kelas)
- `id_langganan_siswa` (FK -> langganan_siswa.id_langganan_siswa)
- `terdaftar_pada`
- `aktif`
- `created_at`, `updated_at`, `deleted_at`

#### `kehadiran_siswa`
- `id_kehadiran_siswa` (PK)
- `id_sesi_kelas` (FK -> sesi_kelas.id_sesi_kelas)
- `id_users_siswa` (FK -> users.id_users)
- `status_kehadiran` (hadir/telat/alpa/sakit)
- `cek_masuk_pada`
- `cek_masuk_latitude`
- `cek_masuk_longitude`
- `id_users_pelatih_pemeriksa` (FK -> users.id_users)
- `catatan`
- `created_at`, `updated_at`, `deleted_at`

#### `kehadiran_pelatih`
- `id_kehadiran_pelatih` (PK)
- `id_sesi_kelas` (FK -> sesi_kelas.id_sesi_kelas, unique)
- `id_users_pelatih` (FK -> users.id_users)
- `cek_masuk_pada`
- `cek_masuk_latitude`
- `cek_masuk_longitude`
- `terlambat`
- `menit_terlambat`
- `created_at`, `updated_at`, `deleted_at`

### D. Pendaftaran, Invoice, Pembayaran

#### `pengajuan_pendaftaran`
- `id_pengajuan_pendaftaran` (PK)
- `id_users_siswa` (FK -> users.id_users)
- `id_paket_langganan_diminta` (FK -> paket_langganan.id_paket_langganan)
- `id_lokasi_kolam_diminati` (FK -> lokasi_kolam.id_lokasi_kolam)
- `hari_diminati` (json)
- `jam_diminati`
- `status_pengajuan` (pending/disetujui/ditolak)
- `alasan_penolakan`
- `id_users_peninjau` (FK -> users.id_users)
- `ditinjau_pada`
- `created_at`, `updated_at`, `deleted_at`

#### `langganan_siswa`
- `id_langganan_siswa` (PK)
- `id_users_siswa` (FK -> users.id_users)
- `id_paket_langganan` (FK -> paket_langganan.id_paket_langganan)
- `mulai_tanggal`
- `akhir_tanggal`
- `total_sesi`
- `sisa_sesi`
- `status_langganan` (aktif/kadaluarsa/suspend)
- `created_at`, `updated_at`, `deleted_at`

#### `grup_keluarga`
- `id_grup_keluarga` (PK)
- `nama_grup`
- `id_users_siswa_utama` (FK -> users.id_users)
- `id_paket_langganan` (FK -> paket_langganan.id_paket_langganan)
- `created_at`, `updated_at`, `deleted_at`

#### `anggota_grup_keluarga`
- `id_anggota_grup_keluarga` (PK)
- `id_grup_keluarga` (FK -> grup_keluarga.id_grup_keluarga)
- `id_users_siswa` (FK -> users.id_users)
- `hubungan`
- `created_at`, `updated_at`, `deleted_at`

#### `invoice`
- `id_invoice` (PK)
- `nomor_invoice` (unique)
- `id_users_siswa` (FK -> users.id_users, nullable)
- `id_grup_keluarga` (FK -> grup_keluarga.id_grup_keluarga, nullable)
- `id_langganan_siswa` (FK -> langganan_siswa.id_langganan_siswa, nullable)
- `tanggal_invoice`
- `jatuh_tempo`
- `subtotal`
- `diskon`
- `total_tagihan`
- `status_invoice` (pending/lunas/ditolak/batal)
- `id_users_pembuat` (FK -> users.id_users)
- `created_at`, `updated_at`, `deleted_at`

#### `item_invoice`
- `id_item_invoice` (PK)
- `id_invoice` (FK -> invoice.id_invoice)
- `tipe_item`
- `deskripsi`
- `jumlah`
- `harga_satuan`
- `total_baris`
- `created_at`, `updated_at`, `deleted_at`

#### `pembayaran`
- `id_pembayaran` (PK)
- `id_invoice` (FK -> invoice.id_invoice)
- `metode_pembayaran`
- `nominal`
- `tanggal_bayar`
- `bukti_bayar_path`
- `status_verifikasi` (pending/disetujui/ditolak)
- `id_users_verifikator` (FK -> users.id_users, nullable)
- `diverifikasi_pada` (nullable)
- `alasan_tolak` (nullable)
- `created_at`, `updated_at`, `deleted_at`

### E. Keuangan dan Gaji

#### `kategori_pemasukan`
- `id_kategori_pemasukan` (PK)
- `nama_kategori`
- `kategori_sistem`
- `created_at`, `updated_at`, `deleted_at`

#### `transaksi_pemasukan`
- `id_transaksi_pemasukan` (PK)
- `id_kategori_pemasukan` (FK -> kategori_pemasukan.id_kategori_pemasukan)
- `sumber_tipe` (invoice/manual/lainnya)
- `sumber_id` (nullable)
- `nominal`
- `tanggal_transaksi`
- `id_lokasi_kolam` (FK -> lokasi_kolam.id_lokasi_kolam, nullable)
- `catatan`
- `id_users_pembuat` (FK -> users.id_users)
- `created_at`, `updated_at`, `deleted_at`

#### `kategori_pengeluaran`
- `id_kategori_pengeluaran` (PK)
- `nama_kategori`
- `tipe_pengeluaran` (tetap/variabel/gaji/lainnya)
- `created_at`, `updated_at`, `deleted_at`

#### `transaksi_pengeluaran`
- `id_transaksi_pengeluaran` (PK)
- `id_kategori_pengeluaran` (FK -> kategori_pengeluaran.id_kategori_pengeluaran)
- `nominal`
- `tanggal_transaksi`
- `id_lokasi_kolam` (FK -> lokasi_kolam.id_lokasi_kolam, nullable)
- `catatan`
- `id_users_pembuat` (FK -> users.id_users)
- `created_at`, `updated_at`, `deleted_at`

#### `periode_gaji`
- `id_periode_gaji` (PK)
- `mulai_periode`
- `akhir_periode`
- `status_periode` (draft/final/terbayar)
- `id_users_pembuat` (FK -> users.id_users)
- `created_at`, `updated_at`, `deleted_at`

#### `gaji_pelatih`
- `id_gaji_pelatih` (PK)
- `id_periode_gaji` (FK -> periode_gaji.id_periode_gaji)
- `id_users_pelatih` (FK -> users.id_users)
- `jumlah_sesi`
- `jumlah_siswa`
- `gaji_kotor`
- `total_potongan`
- `gaji_bersih`
- `status_gaji` (draft/final/terbayar)
- `created_at`, `updated_at`, `deleted_at`

#### `potongan_gaji`
- `id_potongan_gaji` (PK)
- `id_gaji_pelatih` (FK -> gaji_pelatih.id_gaji_pelatih)
- `tipe_potongan`
- `deskripsi`
- `nominal`
- `id_users_pembuat` (FK -> users.id_users)
- `created_at`, `updated_at`, `deleted_at`

### F. Rapor dan Evaluasi

#### `rapor_bulanan`
- `id_rapor_bulanan` (PK)
- `id_users_siswa` (FK -> users.id_users)
- `id_users_pelatih` (FK -> users.id_users)
- `bulan_rapor` (YYYY-MM)
- `level_awal`
- `level_akhir`
- `ringkasan`
- `terkunci`
- `dikirim_pada`
- `created_at`, `updated_at`, `deleted_at`

#### `rapor_enam_bulanan`
- `id_rapor_enam_bulanan` (PK)
- `id_users_siswa` (FK -> users.id_users)
- `id_users_pelatih` (FK -> users.id_users)
- `mulai_periode`
- `akhir_periode`
- `evaluasi`
- `rekomendasi`
- `dikirim_pada`
- `created_at`, `updated_at`, `deleted_at`

#### `evaluasi_triwulan`
- `id_evaluasi_triwulan` (PK)
- `mulai_periode`
- `akhir_periode`
- `id_users_penghasil` (FK -> users.id_users)
- `created_at`, `updated_at`, `deleted_at`

#### `detail_evaluasi_triwulan`
- `id_detail_evaluasi_triwulan` (PK)
- `id_evaluasi_triwulan` (FK -> evaluasi_triwulan.id_evaluasi_triwulan)
- `id_users_siswa` (FK -> users.id_users)
- `id_users_pelatih` (FK -> users.id_users)
- `status_perkembangan` (meningkat/stagnan/menurun)
- `catatan`
- `created_at`, `updated_at`, `deleted_at`

### G. Lomba

#### `event_lomba`
- `id_event_lomba` (PK)
- `nama_event`
- `tanggal_event`
- `lokasi_event`
- `deskripsi`
- `id_users_pembuat` (FK -> users.id_users)
- `created_at`, `updated_at`, `deleted_at`

#### `kategori_lomba`
- `id_kategori_lomba` (PK)
- `id_event_lomba` (FK -> event_lomba.id_event_lomba)
- `nama_kategori`
- `kelompok_usia`
- `jarak_meter`
- `gaya_renang`
- `created_at`, `updated_at`, `deleted_at`

#### `peserta_lomba`
- `id_peserta_lomba` (PK)
- `id_event_lomba` (FK -> event_lomba.id_event_lomba)
- `id_kategori_lomba` (FK -> kategori_lomba.id_kategori_lomba)
- `id_users_siswa` (FK -> users.id_users)
- `id_users_pendaftar` (FK -> users.id_users)
- `created_at`, `updated_at`, `deleted_at`

#### `hasil_lomba`
- `id_hasil_lomba` (PK)
- `id_peserta_lomba` (FK -> peserta_lomba.id_peserta_lomba, unique)
- `catatan_waktu`
- `peringkat`
- `prestasi`
- `catatan`
- `id_users_penginput` (FK -> users.id_users)
- `created_at`, `updated_at`, `deleted_at`

### H. Audit dan Notifikasi

#### `log_audit`
- `id_log_audit` (PK)
- `id_users` (FK -> users.id_users)
- `aksi`
- `entitas_tipe`
- `entitas_id`
- `nilai_lama` (json)
- `nilai_baru` (json)
- `alamat_ip`
- `agen_pengguna`
- `created_at`

#### `notifikasi`
- `id_notifikasi` (PK)
- `id_users` (FK -> users.id_users)
- `judul`
- `pesan`
- `tipe_notifikasi`
- `sudah_dibaca`
- `dibaca_pada`
- `created_at`

## 2) Relasi Utama

- `users` 1-1 `profil_siswa`
- `users` 1-1 `profil_pelatih`
- `users` N-N `roles` melalui `user_role`
- `users` 1-N `langganan_siswa`
- `paket_langganan` 1-N `langganan_siswa`
- `kelas` 1-N `jadwal_kelas`
- `kelas` 1-N `sesi_kelas`
- `users` (siswa) N-N `kelas` melalui `pendaftaran_kelas`
- `sesi_kelas` 1-N `kehadiran_siswa`
- `sesi_kelas` 1-1 `kehadiran_pelatih`
- `invoice` 1-N `item_invoice`
- `invoice` 1-N `pembayaran`
- `periode_gaji` 1-N `gaji_pelatih`
- `gaji_pelatih` 1-N `potongan_gaji`
- `event_lomba` 1-N `kategori_lomba`
- `event_lomba` 1-N `peserta_lomba`
- `peserta_lomba` 1-1 `hasil_lomba`

## 3) Saran Index

- Index semua FK (`id_<nama_tabel>`)
- Index gabungan:
  - `user_role(id_users, id_roles)` unique
  - `sesi_kelas(id_kelas, tanggal_sesi)`
  - `kehadiran_siswa(id_sesi_kelas, id_users_siswa)` unique
  - `langganan_siswa(id_users_siswa, status_langganan)`
  - `invoice(status_invoice, jatuh_tempo)`
  - `pembayaran(status_verifikasi, tanggal_bayar)`
  - `rapor_bulanan(id_users_siswa, bulan_rapor)` unique
