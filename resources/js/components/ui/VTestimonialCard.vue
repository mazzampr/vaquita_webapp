<script setup>
import { Star } from 'lucide-vue-next';

defineProps({
    text: { type: String, required: true },
    name: { type: String, required: true },
    role: { type: String, required: true },
    avatar: { type: String, required: true },
    stars: { type: Number, default: 5 },
});
</script>

<template>
    <div class="bg-surface-alt p-8 rounded-card-lg shadow-sm border border-slate-100">
        <div class="flex text-yellow-400 mb-4">
            <Star v-for="i in stars" :key="i" class="w-5 h-5" fill="currentColor" />
        </div>
        <p class="text-slate-500 italic mb-8 leading-relaxed">"{{ text }}"</p>
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-primary-container flex items-center justify-center font-bold text-primary text-sm">
                {{ avatar }}
            </div>
            <div>
                <p class="font-bold text-sm">{{ name }}</p>
                <p class="text-xs text-slate-500">{{ role }}</p>
            </div>
        </div>
    </div>
</template>
