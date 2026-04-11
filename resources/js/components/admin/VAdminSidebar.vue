<script setup>
import { computed, reactive, watch } from 'vue';
import {
    Activity,
    AlertCircle,
    Banknote,
    BarChart3,
    BookOpen,
    Building2,
    Calendar,
    CalendarCheck,
    CalendarDays,
    CalendarPlus,
    ChevronDown,
    Circle,
    Clock,
    Contact,
    Download,
    FileText,
    LayoutDashboard,
    LifeBuoy,
    LineChart,
    List,
    MapPin,
    Package,
    PlusCircle,
    Receipt,
    Scissors,
    TrendingUp,
    UserPlus,
    Users,
    Wallet,
    Waves,
    Wrench,
    X,
} from 'lucide-vue-next';

const props = defineProps({
    items: {
        type: Array,
        required: true,
    },
    activePage: {
        type: String,
        required: true,
    },
    open: {
        type: Boolean,
        default: false,
    },
});

const emit = defineEmits(['select', 'close']);

const iconMap = {
    Activity,
    AlertCircle,
    Banknote,
    BarChart3,
    BookOpen,
    Building2,
    Calendar,
    CalendarCheck,
    CalendarDays,
    CalendarPlus,
    Clock,
    Contact,
    Download,
    FileText,
    LayoutDashboard,
    LifeBuoy,
    LineChart,
    List,
    MapPin,
    Package,
    PlusCircle,
    Receipt,
    Scissors,
    TrendingUp,
    UserPlus,
    Users,
    Wallet,
    Waves,
    Wrench,
};

const openedGroups = reactive({});

function resolveIcon(iconName) {
    return iconMap[iconName] ?? Circle;
}

function isGroup(item) {
    return Array.isArray(item.children) && item.children.length > 0;
}

function hasActiveChild(item) {
    if (!isGroup(item)) {
        return false;
    }

    return item.children.some((child) => child.id === props.activePage);
}

function toggleGroup(id) {
    openedGroups[id] = !openedGroups[id];
}

function onSelect(id) {
    emit('select', id);
    emit('close');
}

watch(
    () => props.items,
    (items) => {
        for (const item of items) {
            if (isGroup(item) && openedGroups[item.id] === undefined) {
                openedGroups[item.id] = false;
            }
        }
    },
    { immediate: true, deep: true }
);

watch(
    () => props.activePage,
    () => {
        for (const item of props.items) {
            if (isGroup(item) && hasActiveChild(item)) {
                openedGroups[item.id] = true;
            }
        }
    },
    { immediate: true }
);

const overlayClass = computed(() => (props.open ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none'));
const sidebarClass = computed(() => (props.open ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'));
</script>

<template>
    <div
        class="fixed inset-0 z-40 bg-black/50 transition lg:hidden"
        :class="overlayClass"
        @click="$emit('close')"
    ></div>

    <aside
        class="fixed inset-y-0 left-0 z-50 flex w-[272px] flex-col border-r border-slate-200 bg-white transition-transform duration-300"
        :class="sidebarClass"
    >
        <div class="flex h-[72px] items-center justify-between border-b border-slate-200 px-5">
            <div class="flex items-center gap-3">
                <div class="flex size-10 items-center justify-center rounded-xl bg-primary text-white">
                    <Waves class="size-5" />
                </div>
                <div>
                    <h1 class="text-base font-bold text-slate-900">
                        Vaquita
                    </h1>
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-500">
                        Super Admin
                    </p>
                </div>
            </div>
            <button
                type="button"
                class="inline-flex size-9 items-center justify-center rounded-xl border border-slate-200 text-slate-500 lg:hidden"
                @click="$emit('close')"
            >
                <X class="size-5" />
            </button>
        </div>

        <nav class="flex-1 space-y-1 overflow-y-auto p-4 pb-16 hide-scrollbar">
            <template
                v-for="item in props.items"
                :key="item.id"
            >
                <p
                    v-if="item.type === 'label'"
                    class="px-3 pt-2 text-[10px] font-bold uppercase tracking-widest text-slate-400"
                >
                    {{ item.label }}
                </p>
                <div
                    v-else-if="item.type === 'divider'"
                    class="my-2 border-t border-slate-200"
                ></div>

                <button
                    v-else-if="!isGroup(item)"
                    type="button"
                    class="flex w-full items-center gap-3 rounded-xl px-3.5 py-3 text-left text-sm font-medium transition"
                    :class="props.activePage === item.id ? 'bg-primary/10 text-primary' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900'"
                    @click="onSelect(item.id)"
                >
                    <component
                        :is="resolveIcon(item.icon)"
                        class="size-[18px] shrink-0"
                    />
                    <span>{{ item.label }}</span>
                    <span
                        v-if="item.badge"
                        class="ml-auto rounded-full bg-amber-100 px-2 py-0.5 text-[10px] font-bold text-amber-700"
                    >
                        {{ item.badge }}
                    </span>
                </button>

                <div v-else>
                    <button
                        type="button"
                        class="flex w-full items-center gap-3 rounded-xl px-3.5 py-3 text-left text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900"
                        @click="toggleGroup(item.id)"
                    >
                        <component
                            :is="resolveIcon(item.icon)"
                            class="size-[18px] shrink-0"
                        />
                        <span>{{ item.label }}</span>
                        <span
                            v-if="item.badge"
                            class="ml-auto rounded-full bg-rose-100 px-2 py-0.5 text-[10px] font-bold text-rose-700"
                        >
                            {{ item.badge }}
                        </span>
                        <ChevronDown
                            class="size-4 shrink-0 transition"
                            :class="openedGroups[item.id] ? 'rotate-180' : ''"
                        />
                    </button>
                    <div
                        class="overflow-hidden pl-4 transition-all"
                        :class="openedGroups[item.id] ? 'max-h-[500px]' : 'max-h-0'"
                    >
                        <button
                            v-for="child in item.children"
                            :key="child.id"
                            type="button"
                            class="mt-1 flex w-full items-center gap-2 rounded-xl px-3.5 py-2.5 text-left text-sm transition"
                            :class="props.activePage === child.id ? 'bg-primary/10 text-primary' : 'text-slate-500 hover:bg-slate-100 hover:text-slate-900'"
                            @click="onSelect(child.id)"
                        >
                            <component
                                :is="resolveIcon(child.icon)"
                                class="size-4 shrink-0"
                            />
                            <span>{{ child.label }}</span>
                            <span
                                v-if="child.badge"
                                class="ml-auto rounded-full bg-amber-100 px-2 py-0.5 text-[10px] font-bold text-amber-700"
                            >
                                {{ child.badge }}
                            </span>
                        </button>
                    </div>
                </div>
            </template>
        </nav>
    </aside>
</template>
