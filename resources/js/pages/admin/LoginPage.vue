<script setup>
import { reactive, computed } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import { useAuthStore } from '../../stores/auth';
import heroImg from '../../hero.png';

const authStore = useAuthStore();
const router = useRouter();
const route = useRoute();

const form = reactive({
    email: '',
    password: '',
});

const fieldErrors = reactive({
    email: '',
    password: '',
});

const globalError = computed(() => authStore.loginError);

async function submitForm() {
    fieldErrors.email = '';
    fieldErrors.password = '';

    const result = await authStore.login({
        email: form.email,
        password: form.password,
    });

    if (!result.success) {
        fieldErrors.email = result.errors?.email?.[0] ?? '';
        fieldErrors.password = result.errors?.password?.[0] ?? '';
        return;
    }

    const redirectRoute = typeof route.query.redirect === 'string' ? route.query.redirect : null;

    if (redirectRoute) {
        await router.push(redirectRoute);
        return;
    }

    await router.push(authStore.getRoleRoute(result.data.user.role));
}
</script>

<template>
    <main class="relative flex min-h-screen items-center justify-center overflow-hidden px-4 py-10">
        <div class="absolute inset-0">
            <img
                :src="heroImg"
                alt="Kolam renang"
                class="h-full w-full object-cover blur-sm scale-110"
            >
            <div class="absolute inset-0 bg-slate-900/45"></div>
        </div>

        <div class="relative z-10 w-full max-w-md rounded-xl border border-white/35 bg-white/90 p-8 shadow-xl shadow-slate-900/25 backdrop-blur-sm">
            <h1 class="text-2xl font-bold text-slate-900">
                Login Sistem
            </h1>
            <p class="mt-2 text-sm text-slate-600">
                Masuk menggunakan email dan password akun aktif.
            </p>

            <form
                class="mt-6 space-y-4"
                @submit.prevent="submitForm"
            >
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
                        autocomplete="email"
                        placeholder="nama@email.com"
                    >
                    <p
                        v-if="fieldErrors.email"
                        class="text-sm text-rose-600"
                    >
                        {{ fieldErrors.email }}
                    </p>
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
                        autocomplete="current-password"
                        placeholder="Minimal 8 karakter"
                    >
                    <p
                        v-if="fieldErrors.password"
                        class="text-sm text-rose-600"
                    >
                        {{ fieldErrors.password }}
                    </p>
                </div>

                <p
                    v-if="globalError"
                    class="rounded-lg bg-rose-100 px-3 py-2 text-sm text-rose-700"
                >
                    {{ globalError }}
                </p>

                <button
                    type="submit"
                    class="inline-flex w-full items-center justify-center rounded-lg bg-cyan-700 px-4 py-2.5 font-semibold text-white transition hover:bg-cyan-800 disabled:cursor-not-allowed disabled:bg-cyan-500"
                    :disabled="authStore.loadingLogin"
                >
                    <span v-if="authStore.loadingLogin">Memproses...</span>
                    <span v-else>Masuk</span>
                </button>

                <RouterLink
                    :to="{ name: 'register' }"
                    class="inline-flex w-full items-center justify-center rounded-lg border border-cyan-700 px-4 py-2.5 font-semibold text-cyan-700 transition hover:bg-cyan-50"
                >
                    Registrasi
                </RouterLink>
            </form>
        </div>
    </main>
</template>
