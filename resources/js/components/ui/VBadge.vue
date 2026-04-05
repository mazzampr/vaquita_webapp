<script setup>
defineProps({
    color: {
        type: String,
        default: 'primary',
        validator: (v) => ['primary', 'rose', 'white'].includes(v),
    },
});

const colorMap = {
    primary: 'bg-primary-container/30 text-primary',
    rose: 'bg-accent-rose text-white',
    white: 'bg-white/20 text-white',
};
</script>

<template>
    <span :class="[
        'inline-flex items-center gap-2 rounded-pill px-4 py-1.5 text-xs font-bold uppercase tracking-widest',
        colorMap[color],
    ]">
        <slot />
    </span>
</template>
