<script setup>
import { Bell, LogOut, Menu, Search } from 'lucide-vue-next';

const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    subtitle: {
        type: String,
        default: '',
    },
    userName: {
        type: String,
        default: 'Admin',
    },
    roleLabel: {
        type: String,
        default: 'Super Admin',
    },
});

defineEmits(['toggle-sidebar', 'logout']);
</script>

<template>
    <header class="sticky top-0 z-30 border-b border-slate-200 bg-white/95 backdrop-blur">
        <div class="flex h-16 items-center justify-between gap-3 px-4 sm:px-6">
            <div class="flex min-w-0 items-center gap-3">
                <button
                    type="button"
                    class="inline-flex size-10 items-center justify-center rounded-xl border border-slate-200 text-slate-600 lg:hidden"
                    @click="$emit('toggle-sidebar')"
                >
                    <Menu class="size-5" />
                </button>
                <div class="min-w-0">
                    <h1 class="truncate text-lg font-bold text-slate-900">
                        {{ props.title }}
                    </h1>
                    <p
                        v-if="props.subtitle"
                        class="truncate text-xs text-slate-500"
                    >
                        {{ props.subtitle }}
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-2 sm:gap-3">
                <div class="hidden items-center rounded-xl border border-slate-200 px-3 py-2 sm:flex">
                    <Search class="size-4 text-slate-400" />
                    <input
                        type="text"
                        placeholder="Cari data..."
                        class="ml-2 w-40 bg-transparent text-sm text-slate-700 outline-none"
                    >
                </div>

                <button
                    type="button"
                    class="inline-flex size-10 items-center justify-center rounded-xl border border-slate-200 text-slate-600"
                >
                    <Bell class="size-5" />
                </button>

                <div class="hidden text-right sm:block">
                    <p class="text-sm font-semibold text-slate-900">
                        {{ props.userName }}
                    </p>
                    <p class="text-xs text-slate-500">
                        {{ props.roleLabel }}
                    </p>
                </div>

                <button
                    type="button"
                    class="inline-flex size-10 items-center justify-center rounded-xl bg-slate-900 text-white transition hover:bg-slate-700"
                    @click="$emit('logout')"
                >
                    <LogOut class="size-4" />
                </button>
            </div>
        </div>
    </header>
</template>
