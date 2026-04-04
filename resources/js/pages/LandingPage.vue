<script setup>
import { ref } from 'vue';

const serviceHighlights = ref([
    'Program privat dan grup kecil untuk semua level renang.',
    'Monitoring perkembangan siswa dengan target yang terukur.',
    'Jadwal fleksibel dengan pelatih bersertifikat.',
]);
</script>

<template>
    <main class="min-h-screen bg-gradient-to-br from-cyan-100 via-slate-50 to-sky-100">
        <section class="mx-auto flex max-w-6xl flex-col gap-10 px-6 py-16 lg:flex-row lg:items-center">
            <div class="flex-1 space-y-6">
                <p class="inline-flex rounded-full bg-cyan-700/10 px-3 py-1 text-sm font-medium text-cyan-700">
                    Sistem Kelola Les Renang
                </p>
                <h1 class="text-4xl font-bold leading-tight text-slate-900 sm:text-5xl">
                    Platform operasional untuk sekolah renang modern.
                </h1>
                <p class="max-w-xl text-lg text-slate-700">
                    Kelola pendaftaran, jadwal, dan monitoring progres siswa dalam satu sistem terintegrasi.
                </p>
                <div class="flex flex-wrap gap-3">
                    <router-link
                        :to="{ name: 'login' }"
                        class="rounded-lg bg-cyan-700 px-5 py-3 font-semibold text-white transition hover:bg-cyan-800"
                    >
                        Masuk Sistem
                    </router-link>
                </div>
            </div>
            <div class="flex-1 rounded-2xl bg-white p-6 shadow-xl shadow-slate-300/40">
                <h2 class="text-xl font-semibold text-slate-900">
                    Layanan Utama
                </h2>
                <ul
                    v-if="serviceHighlights.length"
                    class="mt-4 space-y-3"
                >
                    <li
                        v-for="item in serviceHighlights"
                        :key="item"
                        class="rounded-lg bg-slate-100 p-4 text-slate-700"
                    >
                        {{ item }}
                    </li>
                </ul>
                <p
                    v-else
                    class="mt-4 rounded-lg bg-amber-100 p-4 text-sm text-amber-800"
                >
                    Konten layanan belum tersedia. Silakan cek kembali nanti.
                </p>
            </div>
        </section>
    </main>
</template>
