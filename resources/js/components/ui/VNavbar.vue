<script setup>
import { ref } from 'vue';
import { Menu, X } from 'lucide-vue-next';
import VBtn from './VBtn.vue';

const open = ref(false);

defineProps({
    links: {
        type: Array,
        default: () => [
            { label: 'Our Coach', href: '#coaches' },
            { label: 'Harga', href: '#harga' },
            { label: 'Kontak', href: '#kontak' },
        ],
    },
});
</script>

<template>
    <header class="fixed top-0 left-0 right-0 z-50">
        <nav class="w-full bg-white/80 backdrop-blur-lg shadow-sm">
            <div class="flex justify-between items-center px-8 py-4 max-w-7xl mx-auto">
                <!-- Logo -->
                <a href="/" class="text-2xl font-bold text-primary tracking-tight font-display flex-shrink-0">Vaquita</a>

                <!-- Desktop Links -->
                <div class="hidden md:flex flex-1 justify-center gap-8 items-center font-display font-medium">
                    <a
                        v-for="link in links"
                        :key="link.label"
                        :href="link.href"
                        class="text-slate-600 hover:text-primary transition-colors duration-300"
                    >
                        {{ link.label }}
                    </a>
                </div>

                <!-- CTA Buttons -->
                <div class="hidden md:flex flex-shrink-0 items-center gap-3">
                    <router-link
                        :to="{ name: 'login' }"
                        class="text-slate-600 hover:text-primary transition-colors duration-300 font-medium"
                    >
                        Login
                    </router-link>
                    <VBtn variant="primary" :to="{ name: 'register' }" size="md" class="!px-6 !py-2.5 !shadow-none">Daftar Sekarang</VBtn>
                </div>

                <!-- Mobile Menu -->
                <button @click="open = !open" class="md:hidden text-primary p-2">
                    <Menu v-if="!open" class="w-6 h-6" />
                    <X v-else class="w-6 h-6" />
                </button>
            </div>
        </nav>

        <!-- Mobile Nav Dropdown -->
        <Transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="opacity-0 -translate-y-2"
            enter-to-class="opacity-100 translate-y-0"
            leave-active-class="transition ease-in duration-150"
            leave-from-class="opacity-100 translate-y-0"
            leave-to-class="opacity-0 -translate-y-2"
        >
            <div v-if="open" class="absolute left-4 right-4 top-[84px] bg-white rounded-2xl shadow-xl border border-slate-100 p-4 md:hidden">
                <div class="flex flex-col space-y-3 px-2">
                    <a
                        v-for="link in links"
                        :key="link.label"
                        :href="link.href"
                        class="font-semibold text-slate-700"
                        @click="open = false"
                    >
                        {{ link.label }}
                    </a>
                    <hr class="border-slate-100">
                    <VBtn variant="outline" :to="{ name: 'login' }" size="md" class="w-full text-center">Login</VBtn>
                    <VBtn variant="primary" :to="{ name: 'register' }" size="md" class="w-full text-center" @click="open = false">Daftar Sekarang</VBtn>
                </div>
            </div>
        </Transition>
    </header>
</template>
