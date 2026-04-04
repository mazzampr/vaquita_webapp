# Agent Playbook (Operational Summary)

Gunakan dokumen ini sebagai ringkasan operasional.
Standar detail ada di `doc/standard-code.md`.

## Prioritas
1. Benar dan aman
2. Rapi dan modular
3. Konsisten backend-frontend
4. Siap production

## Aturan Eksekusi
- Ikuti `doc/standard-code.md` untuk standar teknis lengkap
- Gunakan `doc/task/feature-list.md` untuk melihat prioritas fitur
- Ikuti file task per fitur pada folder `doc/task/`
- Jangan melebar dari scope task
- Hindari duplikasi logic
- Jaga kontrak API tetap sinkron

## Output Wajib
1. Ringkasan pendekatan (maks 5 poin)
2. Struktur file yang diubah/dibuat
3. Kode final lengkap
4. Asumsi singkat (jika ada)

## Definition of Done
- [ ] Requirement task terpenuhi
- [ ] Sesuai `doc/standard-code.md`
- [ ] Tidak ada anti-pattern utama
- [ ] Lint/test/check relevan lulus
