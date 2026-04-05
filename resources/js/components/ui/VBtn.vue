<script setup>
import { computed } from 'vue';

const props = defineProps({
    variant: {
        type: String,
        default: 'primary',
        validator: (v) => ['primary', 'outline', 'ghost', 'white'].includes(v),
    },
    size: {
        type: String,
        default: 'md',
        validator: (v) => ['sm', 'md', 'lg'].includes(v),
    },
    href: { type: String, default: null },
    to: { type: [String, Object], default: null },
    external: { type: Boolean, default: false },
});

const tag = computed(() => {
    if (props.to) return 'router-link';
    if (props.href) return 'a';
    return 'button';
});

const linkProps = computed(() => {
    if (props.to) return { to: props.to };
    if (props.href) {
        const attrs = { href: props.href };
        if (props.external) {
            attrs.target = '_blank';
            attrs.rel = 'noopener noreferrer';
        }
        return attrs;
    }
    return { type: 'button' };
});

const baseClasses = 'inline-flex items-center justify-center gap-2 font-bold transition-all active:scale-95';

const sizeClasses = computed(() => ({
    sm: 'px-5 py-2 text-sm rounded-pill',
    md: 'px-7 py-2.5 text-sm rounded-pill',
    lg: 'px-8 py-4 text-base rounded-pill',
}[props.size]));

const variantClasses = computed(() => ({
    primary: 'bg-primary text-white shadow-lg hover:bg-primary-soft',
    outline: 'border-2 border-primary text-primary hover:bg-primary hover:text-white',
    ghost: 'text-primary hover:bg-primary/5',
    white: 'bg-white text-primary shadow-lg hover:scale-105',
}[props.variant]));
</script>

<template>
    <component
        :is="tag"
        v-bind="linkProps"
        :class="[baseClasses, sizeClasses, variantClasses]"
    >
        <slot />
    </component>
</template>
