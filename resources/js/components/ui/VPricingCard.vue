<script setup>
import VBtn from './VBtn.vue';
import VBadge from './VBadge.vue';

defineProps({
    title: { type: String, required: true },
    items: { type: Array, required: true },
    bestSeller: { type: Boolean, default: false },
    ctaHref: { type: String, default: 'https://wa.me/6281510425560' },
});
</script>

<template>
    <div :class="[
        'p-8 rounded-card-lg shadow-sm flex flex-col relative',
        bestSeller
            ? 'bg-white shadow-lg border-2 border-primary'
            : 'bg-white border border-slate-100'
    ]">
        <div v-if="bestSeller" class="absolute -top-4 left-1/2 -translate-x-1/2">
            <VBadge color="rose">BEST SELLER</VBadge>
        </div>

        <h3 class="text-lg font-bold mb-4 min-h-[3.5rem]">{{ title }}</h3>

        <ul class="space-y-4 mb-8 flex-grow">
            <li
                v-for="item in items"
                :key="item.label"
                :class="[
                    'flex justify-between items-start gap-2',
                    item.highlight ? 'bg-primary-container/30 p-2 rounded-lg' : ''
                ]"
            >
                <span :class="['text-sm', item.highlight ? 'font-bold' : 'text-slate-500']">
                    {{ item.label }}
                </span>
                <span :class="['font-bold shrink-0', item.special ? 'text-accent-rose' : 'text-primary']">
                    {{ item.price }}
                </span>
            </li>
        </ul>

        <VBtn
            :variant="bestSeller ? 'primary' : 'outline'"
            :href="ctaHref"
            external
            size="md"
            class="w-full"
        >
            Pilih Paket
        </VBtn>
    </div>
</template>
