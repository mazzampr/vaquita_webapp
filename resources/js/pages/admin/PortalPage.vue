<script setup>
import { computed } from 'vue';
import { useRouter } from 'vue-router';
import { useAuthStore } from '../../stores/auth';
import SuperAdminDashboard from './SuperAdminDashboard.vue';

const authStore = useAuthStore();
const router = useRouter();

const roleLabel = computed(() => {
    const role = authStore.authUser?.role;

    switch (role) {
        case 'super_admin':
            return 'Super Admin';
        case 'admin':
            return 'Admin';
        case 'coach':
            return 'Pelatih';
        case 'student':
            return 'Siswa';
        default:
            return 'Pengguna';
    }
});

const showAdminDashboard = computed(() => {
    const role = authStore.authUser?.role;

    return role === 'super_admin' || role === 'admin';
});

async function handleLogout() {
    await authStore.logout();
    await router.push({ name: 'login' });
}
</script>

<template>
    <SuperAdminDashboard
        v-if="showAdminDashboard"
        :user-name="authStore.authUser?.name ?? 'Admin'"
        :role-label="roleLabel"
        @logout="handleLogout"
    />
    <main
        v-else
        class="min-h-screen bg-slate-100 px-4 py-10"
    >
        <section class="mx-auto max-w-3xl rounded-xl bg-white p-8 shadow-lg">
            <p class="text-sm font-medium text-cyan-700">
                Login berhasil
            </p>
            <h1 class="mt-2 text-3xl font-bold text-slate-900">
                Halo, {{ authStore.authUser?.name }}
            </h1>
            <p class="mt-2 text-slate-600">
                Anda masuk sebagai {{ roleLabel }}.
            </p>

            <div class="mt-8 rounded-lg bg-slate-100 p-4 text-sm text-slate-700">
                Dashboard khusus role ini belum dislice.
            </div>

            <button
                type="button"
                class="mt-6 rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-slate-700"
                @click="handleLogout"
            >
                Logout
            </button>
        </section>
    </main>
</template>
