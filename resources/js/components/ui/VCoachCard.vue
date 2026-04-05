<script setup>
import { User } from 'lucide-vue-next';

defineProps({
    name: { type: String, required: true },
    specialty: { type: String, required: true },
});
</script>

<template>
    <div class="group relative flex-none w-[280px] snap-center">
        <div class="aspect-[3/4] rounded-card-lg overflow-hidden mb-4 grayscale group-hover:grayscale-0 transition-all duration-500 bg-primary-container flex items-center justify-center shadow-sm hover:shadow-md">
            <div class="text-center px-6">
                <div class="w-24 h-24 rounded-full bg-primary/20 flex items-center justify-center mx-auto mb-4">
                    <User class="w-12 h-12 text-primary" />
                </div>
                <p class="font-bold text-primary">{{ name }}</p>
                <p class="text-xs text-slate-500 mt-1">{{ specialty }}</p>
            </div>
        </div>
        <div class="absolute bottom-4 left-4 right-4 bg-white/90 backdrop-blur p-3 rounded-xl transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all shadow-lg border border-slate-100">
            <p class="font-bold text-sm text-slate-800">{{ name }}</p>
            <p class="text-xs text-slate-500">{{ specialty }}</p>
        </div>
    </div>
</template>
