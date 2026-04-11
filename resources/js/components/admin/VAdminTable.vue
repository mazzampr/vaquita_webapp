<script setup>
const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    subtitle: {
        type: String,
        default: '',
    },
    columns: {
        type: Array,
        required: true,
    },
    rows: {
        type: Array,
        default: () => [],
    },
    emptyText: {
        type: String,
        default: 'Belum ada data.',
    },
});

function badgeClass(column, value) {
    if (!column.badges || !value) {
        return 'bg-slate-100 text-slate-600';
    }

    return column.badges[value] ?? 'bg-slate-100 text-slate-600';
}
</script>

<template>
    <section class="rounded-2xl border border-slate-200 bg-white">
        <header class="border-b border-slate-200 px-5 py-4">
            <h3 class="text-base font-bold text-slate-900">
                {{ props.title }}
            </h3>
            <p
                v-if="props.subtitle"
                class="mt-1 text-sm text-slate-500"
            >
                {{ props.subtitle }}
            </p>
        </header>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-50">
                    <tr>
                        <th
                            v-for="col in props.columns"
                            :key="col.key"
                            class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500"
                        >
                            {{ col.label }}
                        </th>
                    </tr>
                </thead>
                <tbody v-if="props.rows.length">
                    <tr
                        v-for="(row, idx) in props.rows"
                        :key="idx"
                        class="border-t border-slate-200"
                    >
                        <td
                            v-for="col in props.columns"
                            :key="col.key"
                            class="px-5 py-3.5 text-slate-700"
                        >
                            <span
                                v-if="col.type === 'badge'"
                                class="inline-flex rounded-full px-2.5 py-1 text-xs font-semibold"
                                :class="badgeClass(col, row[col.key])"
                            >
                                {{ row[col.key] }}
                            </span>
                            <span v-else>
                                {{ row[col.key] }}
                            </span>
                        </td>
                    </tr>
                </tbody>
                <tbody v-else>
                    <tr>
                        <td
                            :colspan="props.columns.length"
                            class="px-5 py-8 text-center text-sm text-slate-500"
                        >
                            {{ props.emptyText }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>
