<script setup>
const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    value: {
        type: String,
        required: true,
    },
    note: {
        type: String,
        default: '',
    },
    icon: {
        type: [Object, Function],
        default: null,
    },
    toneClass: {
        type: String,
        default: 'bg-primary/10 text-primary',
    },
});
</script>

<template>
    <article class="rounded-2xl border border-slate-200 bg-white p-5 transition hover:-translate-y-0.5 hover:shadow-md">
        <div class="flex items-start justify-between gap-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                    {{ props.title }}
                </p>
                <p class="mt-2 text-2xl font-bold text-slate-900">
                    {{ props.value }}
                </p>
                <p
                    v-if="props.note"
                    class="mt-1 text-xs text-slate-500"
                >
                    {{ props.note }}
                </p>
            </div>
            <div
                v-if="props.icon"
                class="flex size-11 items-center justify-center rounded-xl"
                :class="props.toneClass"
            >
                <component
                    :is="props.icon"
                    class="size-5"
                />
            </div>
        </div>
    </article>
</template>
