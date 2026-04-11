<script setup>
import { reactive } from 'vue';

const form = reactive({
    name: '',
    email: '',
    phone: '',
    password: '',
});
</script>

<template>
    <main class="relative flex min-h-screen items-center justify-center overflow-hidden px-4 py-10">
        <div class="absolute inset-0">
            <img
                src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1600&q=80"
                alt="Kolam renang"
                class="h-full w-full object-cover blur-sm"
            >
            <div class="absolute inset-0 bg-slate-900/45"></div>
        </div>

        <section class="relative z-10 w-full max-w-lg rounded-2xl border border-white/40 bg-white/90 p-8 shadow-2xl backdrop-blur-sm">
            <h1 class="text-2xl font-bold text-slate-900">
                Registrasi Akun
            </h1>
            <p class="mt-2 text-sm text-slate-600">
                Isi data berikut untuk pendaftaran akun baru.
            </p>

            <form class="mt-6 space-y-4">
                <div class="space-y-1">
                    <label
                        for="name"
                        class="text-sm font-medium text-slate-700"
                    >
                        Nama Lengkap
                    </label>
                    <input
                        id="name"
                        v-model="form.name"
                        type="text"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 outline-none ring-cyan-500 transition focus:ring"
                        placeholder="Nama lengkap"
                    >
                </div>

                <div class="space-y-1">
                    <label
                        for="email"
                        class="text-sm font-medium text-slate-700"
                    >
                        Email
                    </label>
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 outline-none ring-cyan-500 transition focus:ring"
                        placeholder="nama@email.com"
                    >
                </div>

                <div class="space-y-1">
                    <label
                        for="phone"
                        class="text-sm font-medium text-slate-700"
                    >
                        Nomor WhatsApp
                    </label>
                    <input
                        id="phone"
                        v-model="form.phone"
                        type="text"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 outline-none ring-cyan-500 transition focus:ring"
                        placeholder="08xxxxxxxxxx"
                    >
                </div>

                <div class="space-y-1">
                    <label
                        for="password"
                        class="text-sm font-medium text-slate-700"
                    >
                        Password
                    </label>
                    <input
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 outline-none ring-cyan-500 transition focus:ring"
                        placeholder="Minimal 8 karakter"
                    >
                </div>

                <button
                    type="button"
                    class="inline-flex w-full items-center justify-center rounded-lg bg-cyan-700 px-4 py-2.5 font-semibold text-white transition hover:bg-cyan-800"
                >
                    Daftar
                </button>
            </form>

            <p class="mt-4 text-center text-sm text-slate-600">
                Sudah punya akun?
                <RouterLink
                    :to="{ name: 'login' }"
                    class="font-semibold text-cyan-700 hover:text-cyan-800"
                >
                    Login di sini
                </RouterLink>
            </p>
        </section>
    </main>
</template>
