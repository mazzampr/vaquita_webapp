<script setup>
import { computed, ref } from 'vue';
import { CircleDollarSign, UserCheck, UserPlus2, Users } from 'lucide-vue-next';
import VAdminSidebar from '../../components/admin/VAdminSidebar.vue';
import VAdminStatCard from '../../components/admin/VAdminStatCard.vue';
import VAdminTable from '../../components/admin/VAdminTable.vue';
import VAdminTopbar from '../../components/admin/VAdminTopbar.vue';

const props = defineProps({
    userName: {
        type: String,
        default: 'Admin',
    },
    roleLabel: {
        type: String,
        default: 'Super Admin',
    },
});

const emit = defineEmits(['logout']);

const activePage = ref('dashboard');
const sidebarOpen = ref(false);

const menuItems = [
    { id: 'dashboard', label: 'Dashboard', icon: 'LayoutDashboard' },
    {
        id: 'siswa',
        label: 'Manajemen Siswa',
        icon: 'Users',
        badge: '3',
        children: [
            { id: 'daftar-siswa', label: 'Daftar Siswa', icon: 'List' },
            { id: 'pendaftar-baru', label: 'Pendaftar Baru', icon: 'UserPlus', badge: '3' },
            { id: 'paket-langganan', label: 'Paket Langganan', icon: 'Package' },
        ],
    },
    {
        id: 'pelatih',
        label: 'Manajemen Pelatih',
        icon: 'LifeBuoy',
        children: [
            { id: 'daftar-pelatih', label: 'Daftar Pelatih', icon: 'Contact' },
            { id: 'rekap-kehadiran', label: 'Rekap Kehadiran', icon: 'CalendarCheck' },
            { id: 'potongan-gaji', label: 'Potongan Gaji', icon: 'Scissors' },
        ],
    },
    {
        id: 'jadwal',
        label: 'Jadwal',
        icon: 'Calendar',
        children: [
            { id: 'kalender-jadwal', label: 'Kalender Jadwal', icon: 'CalendarDays' },
            { id: 'atur-jadwal', label: 'Atur Jadwal', icon: 'CalendarPlus' },
            { id: 'lokasi-kolam', label: 'Lokasi Kolam', icon: 'MapPin' },
        ],
    },
    {
        id: 'invoice',
        label: 'Invoice & Bayar',
        icon: 'Receipt',
        badge: '5',
        children: [
            { id: 'pembayaran-pending', label: 'Pembayaran Pending', icon: 'Clock', badge: '5' },
            { id: 'histori-invoice', label: 'Histori Invoice', icon: 'FileText' },
        ],
    },
    {
        id: 'progress',
        label: 'Progress Siswa',
        icon: 'TrendingUp',
        children: [
            { id: 'monitor-progress', label: 'Monitor Progress', icon: 'Activity' },
            { id: 'rapot', label: 'Rapot Bulanan', icon: 'BookOpen' },
        ],
    },
    { id: 'divider-1', type: 'divider' },
    { id: 'label-owner', type: 'label', label: 'Eksklusif Owner' },
    {
        id: 'keuangan',
        label: 'Keuangan',
        icon: 'Wallet',
        children: [
            { id: 'rekap-pemasukan', label: 'Rekap Pemasukan', icon: 'TrendingUp' },
            { id: 'pemasukan-lainnya', label: 'Pemasukan Lainnya', icon: 'PlusCircle' },
            { id: 'piutang-pending', label: 'Piutang Pending', icon: 'AlertCircle' },
            { id: 'gaji-pelatih', label: 'Gaji Pelatih', icon: 'Banknote' },
            { id: 'fixed-cost', label: 'Fixed Cost', icon: 'Building2' },
            { id: 'variable-cost', label: 'Variable Cost', icon: 'Wrench' },
            { id: 'pnl-bulanan', label: 'P&L Bulanan', icon: 'BarChart3' },
            { id: 'cashflow', label: 'Cashflow', icon: 'LineChart' },
            { id: 'export', label: 'Export Laporan', icon: 'Download' },
        ],
    },
];

const pageTitles = {
    dashboard: 'Dashboard',
    'daftar-siswa': 'Daftar Siswa',
    'pendaftar-baru': 'Pendaftar Baru',
    'paket-langganan': 'Paket Langganan',
    'daftar-pelatih': 'Daftar Pelatih',
    'rekap-kehadiran': 'Rekap Kehadiran Pelatih',
    'potongan-gaji': 'Potongan Gaji',
    'kalender-jadwal': 'Kalender Jadwal',
    'atur-jadwal': 'Atur Jadwal',
    'lokasi-kolam': 'Lokasi Kolam',
    'pembayaran-pending': 'Pembayaran Pending',
    'histori-invoice': 'Histori Invoice',
    'monitor-progress': 'Monitor Progress Siswa',
    rapot: 'Rapot Bulanan',
    'rekap-pemasukan': 'Rekap Pemasukan',
    'pemasukan-lainnya': 'Pemasukan Lainnya',
    'piutang-pending': 'Piutang Pending',
    'gaji-pelatih': 'Gaji Pelatih',
    'fixed-cost': 'Fixed Cost',
    'variable-cost': 'Variable Cost',
    'pnl-bulanan': 'P&L Bulanan',
    cashflow: 'Cashflow',
    export: 'Export Laporan',
};

const pageSubtitles = {
    dashboard: 'Ringkasan operasional harian sistem kelola les renang.',
};

const title = computed(() => pageTitles[activePage.value] ?? 'Dashboard');
const subtitle = computed(() => pageSubtitles[activePage.value] ?? 'Halaman ini sedang dalam tahap implementasi.');
const isDashboard = computed(() => activePage.value === 'dashboard');

const statCards = [
    { title: 'Total Siswa Aktif', value: '128', note: '+9 bulan ini', icon: Users, toneClass: 'bg-primary/10 text-primary' },
    { title: 'Pelatih Aktif', value: '14', note: '2 pelatih off hari ini', icon: UserCheck, toneClass: 'bg-sky-100 text-sky-600' },
    { title: 'Pendaftar Baru', value: '3', note: 'Perlu verifikasi', icon: UserPlus2, toneClass: 'bg-rose-100 text-rose-600' },
    { title: 'Laba Bulan Ini', value: 'Rp12.500.000', note: '+13.6% dari bulan lalu', icon: CircleDollarSign, toneClass: 'bg-emerald-100 text-emerald-600' },
];

const pendingApplicants = [
    { nama: 'Anisa Putri', paket: 'Regular Class 7+ Tahun', jadwal: 'Senin, 16:00', status: 'Menunggu' },
    { nama: 'Raka Mahendra', paket: 'Private Class', jadwal: 'Sabtu, 09:00', status: 'Konfirmasi' },
    { nama: 'Alya Kurnia', paket: 'Semi Private', jadwal: 'Rabu, 15:00', status: 'Menunggu' },
];

const todaySessions = [
    { waktu: '07:00', pelatih: 'Coach Rina', lokasi: 'Kolam Utama', siswa: '4/5' },
    { waktu: '09:00', pelatih: 'Coach Budi', lokasi: 'Kolam Timur', siswa: '2/5' },
    { waktu: '14:00', pelatih: 'Coach Arif', lokasi: 'Kolam Utama', siswa: '5/5' },
];

const pendingColumns = [
    { key: 'nama', label: 'Nama' },
    { key: 'paket', label: 'Paket' },
    { key: 'jadwal', label: 'Jadwal Pilihan' },
    {
        key: 'status',
        label: 'Status',
        type: 'badge',
        badges: {
            Menunggu: 'bg-amber-100 text-amber-700',
            Konfirmasi: 'bg-sky-100 text-sky-700',
        },
    },
];

const sessionColumns = [
    { key: 'waktu', label: 'Waktu' },
    { key: 'pelatih', label: 'Pelatih' },
    { key: 'lokasi', label: 'Lokasi' },
    { key: 'siswa', label: 'Terisi' },
];

function navigate(pageId) {
    activePage.value = pageId;
}
</script>

<template>
    <div class="min-h-screen bg-[#FBFDFC]">
        <VAdminSidebar
            :items="menuItems"
            :active-page="activePage"
            :open="sidebarOpen"
            @select="navigate"
            @close="sidebarOpen = false"
        />

        <div class="lg:pl-[272px]">
            <VAdminTopbar
                :title="title"
                :subtitle="subtitle"
                :user-name="props.userName"
                :role-label="props.roleLabel"
                @toggle-sidebar="sidebarOpen = true"
                @logout="emit('logout')"
            />

            <main class="space-y-6 p-4 sm:p-6">
                <template v-if="isDashboard">
                    <section class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">
                        <VAdminStatCard
                            v-for="card in statCards"
                            :key="card.title"
                            :title="card.title"
                            :value="card.value"
                            :note="card.note"
                            :icon="card.icon"
                            :tone-class="card.toneClass"
                        />
                    </section>

                    <section class="grid grid-cols-1 gap-6 xl:grid-cols-2">
                        <VAdminTable
                            title="Pendaftar Baru"
                            subtitle="Daftar calon siswa yang perlu ditindaklanjuti."
                            :columns="pendingColumns"
                            :rows="pendingApplicants"
                        />
                        <VAdminTable
                            title="Jadwal Hari Ini"
                            subtitle="Ringkasan sesi les yang berlangsung hari ini."
                            :columns="sessionColumns"
                            :rows="todaySessions"
                        />
                    </section>
                </template>

                <section
                    v-else
                    class="rounded-2xl border border-dashed border-slate-300 bg-white p-8 text-center"
                >
                    <h2 class="text-xl font-bold text-slate-900">
                        {{ title }}
                    </h2>
                    <p class="mt-2 text-sm text-slate-500">
                        Slicing dashboard sudah dipasang. Konten detail untuk menu ini bisa dilanjutkan bertahap.
                    </p>
                </section>
            </main>
        </div>
    </div>
</template>
