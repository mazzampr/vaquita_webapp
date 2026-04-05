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
    <header class="fixed top-0 left-0 right-0 z-50 px-4 py-4 md:px-8">
        <nav class="mx-auto max-w-7xl bg-white/70 backdrop-blur-xl border border-white/20 shadow-[0_8px_32px_0_rgba(0,0,0,0.05)] rounded-pill transition-all duration-300">
            <div class="flex justify-between items-center px-6 py-3">
                <!-- Logo -->
                <a href="/" class="text-2xl font-bold text-primary tracking-tight flex-shrink-0">Vaquita</a>

                <!-- Desktop Links -->
                <div class="hidden md:flex flex-1 justify-center gap-10 items-center font-semibold">
                    <a
                        v-for="link in links"
                        :key="link.label"
                        :href="link.href"
                        class="text-slate-700 hover:text-primary transition-colors duration-300 text-sm"
                    >
                        {{ link.label }}
                    </a>
                </div>

                <!-- CTA Buttons -->
                <div class="hidden md:flex flex-shrink-0 items-center gap-2">
                    <VBtn variant="ghost" :to="{ name: 'login' }" size="md">Login</VBtn>
                    <VBtn variant="primary" href="https://wa.me/6281510425560" external size="md">Daftar Sekarang</VBtn>
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
            <div v-if="open" class="absolute left-4 right-4 top-[80px] bg-white rounded-2xl shadow-xl border border-slate-100 p-4 md:hidden">
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
                    <VBtn variant="primary" href="https://wa.me/6281510425560" external size="md" class="w-full text-center" @click="open = false">Daftar Sekarang</VBtn>
                </div>
            </div>
        </Transition>
    </header>
</template>
