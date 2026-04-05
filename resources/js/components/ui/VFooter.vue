<script setup>
defineProps({
    links: {
        type: Array,
        default: () => [
            { label: 'Instagram', href: 'https://instagram.com/lesrenang.vaquita' },
            { label: 'WhatsApp', href: 'https://wa.me/6281510425560' },
            { label: 'TikTok', href: '#' },
            { label: 'Program', href: '#program' },
            { label: 'Harga', href: '#harga' },
            { label: 'Kontak', href: '#kontak' },
        ],
    },
});
</script>

<template>
    <footer class="bg-slate-50 w-full rounded-t-[3rem] mt-8">
        <div class="flex flex-col items-center py-16 px-8 gap-8 w-full text-center max-w-7xl mx-auto">
            <div class="text-xl font-bold text-primary">Vaquita</div>

            <div class="flex flex-wrap justify-center gap-x-8 gap-y-4 text-sm">
                <a
                    v-for="link in links"
                    :key="link.label"
                    :href="link.href"
                    class="text-slate-500 hover:text-primary transition-all"
                >
                    {{ link.label }}
                </a>
            </div>

            <div class="h-px w-24 bg-slate-200"></div>

            <p class="text-slate-500 text-sm max-w-md">
                © {{ new Date().getFullYear() }} Les Renang Vaquita Surabaya. All rights reserved.<br/>
                Profesional, Ramah, dan Terpercaya di Seluruh Surabaya.
            </p>
        </div>
    </footer>
</template>
