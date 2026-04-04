# Task System (Feature List -> Task File)

Dokumen ini jadi panduan cepat untuk mengubah backlog fitur menjadi task implementasi.

## Quick Start (60 Detik)
1. Pilih fitur dari `doc/feature-list.md` dengan status `Planned` atau `Ready`.
2. Copy template `doc/task/_template.task.md` ke `doc/task/<nama-fitur>.task.md`.
3. Isi requirement secara konkret.
4. Ubah status fitur di `doc/feature-list.md` menjadi `In Progress`.
5. Kirim file task ke AI untuk implementasi.
6. Saat selesai, ubah status fitur menjadi `Done`.

## Struktur File (Aktual)
- Feature backlog: `doc/feature-list.md`
- Template task: `doc/task/_template.task.md`
- Task per fitur: `doc/task/<nama-fitur>.task.md`

## Konvensi Nama
- Gunakan kebab-case: `doc/task/user-management.task.md`
- Satu file task hanya untuk satu fitur.
- Jangan gabungkan beberapa fitur dalam satu task.

## Checklist Generate Task
- [ ] Fitur dipilih dari backlog.
- [ ] File task baru dibuat dari template.
- [ ] Semua section utama terisi (backend, frontend, data contract, NFR, testing).
- [ ] Status backlog di-update ke `In Progress`.

## Prompt Siap Pakai
```md
Buat task baru dari fitur ini:
- Feature ID: <ID>
- Nama fitur: <Nama Fitur>
- Prioritas: <High/Medium/Low>
- Catatan backlog: <catatan singkat>

Gunakan template `doc/task/_template.task.md`
Simpan sebagai `doc/task/<nama-fitur>.task.md`
Isi lengkap dan konkret sesuai `doc/standard-code.md`.
```

## Tracking
### Task Aktif
- [ ] -

### Task Selesai
- [x] `doc/task/repo-setup-landing-login.task.md`

