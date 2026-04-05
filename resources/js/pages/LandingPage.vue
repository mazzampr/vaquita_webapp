<script setup>
import { ref } from 'vue';
import heroImg from '../hero.png';

// Lucide icons (only page-specific ones; component-level icons live in their own files)
import {
    ArrowRight,
    ShieldCheck,
    GraduationCap,
    CalendarDays,
    Users,
    ChevronLeft,
    ChevronRight,
    MessageCircle,
    MapPin,
} from 'lucide-vue-next';

// Reusable UI components
import VNavbar from '../components/ui/VNavbar.vue';
import VBtn from '../components/ui/VBtn.vue';
import VBadge from '../components/ui/VBadge.vue';
import VTestimonialCard from '../components/ui/VTestimonialCard.vue';
import VPricingCard from '../components/ui/VPricingCard.vue';
import VCoachCard from '../components/ui/VCoachCard.vue';
import VFooter from '../components/ui/VFooter.vue';

// ── Page Data ────────────────────────────────

const coachContainer = ref(null);

const packages = [
    {
        title: 'Kelas Panggilan (Req Tempat)',
        bestSeller: false,
        items: [
            { label: 'Private (1 Siswa)', price: 'Rp 600k' },
            { label: 'Keluarga 2', price: 'Rp 700k' },
            { label: 'Keluarga 3', price: 'Rp 900k' },
        ]
    },
    {
        title: 'Regular Class (3-6 Tahun)',
        bestSeller: false,
        items: [
            { label: 'Private (1 Siswa)', price: 'Rp 500k' },
            { label: 'Semi Private (2)', price: 'Rp 400k' },
        ]
    },
    {
        title: 'Regular Class (7 Thn - Dewasa)',
        bestSeller: true,
        items: [
            { label: 'Private (1 Siswa)', price: 'Rp 500k' },
            { label: 'Semi Private (2)', price: 'Rp 400k' },
            { label: 'Swimming Class (3-5)', price: 'Rp 200k', highlight: true },
        ]
    },
    {
        title: 'Paket Keluarga & Special Student',
        bestSeller: false,
        items: [
            { label: 'Min 6 Thn (2 Siswa)', price: 'Rp 600k' },
            { label: 'Min 6 Thn (3 Siswa)', price: 'Rp 800k' },
            { label: 'Special Private', price: 'Rp 600k', special: true },
        ]
    },
];

const testimonials = [
    {
        text: 'Sangat puas dengan progres anak saya. Awalnya takut air, sekarang malah nggak mau udahan kalau les. Coach-nya sabar banget!',
        name: 'Mama Arkan',
        role: 'Orang Tua Murid',
        avatar: 'MA',
    },
    {
        text: 'Belajar gaya bebas jadi terasa mudah. Metode yang diajarkan sangat teknis tapi simpel buat dipahami orang dewasa seperti saya.',
        name: 'Mas Rendy',
        role: 'Siswa Kelas Dewasa',
        avatar: 'MR',
    },
    {
        text: 'Terima kasih Vaquita! Anak kami yang berkebutuhan khusus jadi lebih percaya diri dan motoriknya berkembang pesat berkat terapi renang ini.',
        name: 'Ibu Widya',
        role: 'Orang Tua Murid',
        avatar: 'IW',
    },
];

const coaches = [
    { name: 'Coach Budi', specialty: 'Spesialis Anak & Terapi' },
    { name: 'Coach Sarah', specialty: 'Teknik Dewasa & Gaya Bebas' },
    { name: 'Coach Andi', specialty: 'Pelatih Kepala & Sertifikasi' },
    { name: 'Coach Maya', specialty: 'Kelas Balita (Toddler)' },
];

const scrollCoach = (direction) => {
    coachContainer.value?.scrollBy({ left: direction * 300, behavior: 'smooth' });
};
</script>

<template>
    <div class="bg-surface text-ink min-h-screen">

        <!-- Navbar -->
        <VNavbar />

        <!-- Hero Section -->
        <section class="relative isolate overflow-hidden pt-32 pb-20 px-6 md:px-12 lg:px-24">
            <div class="absolute top-[-10%] right-[-5%] w-[400px] h-[400px] bg-[#92f5d7] opacity-30 blob-shape -z-10"></div>
            <div class="absolute bottom-0 left-[-5%] w-[300px] h-[300px] bg-primary-container opacity-40 blob-shape -z-10"></div>

            <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-16">
                <!-- Text -->
                <div class="w-full md:w-3/5 space-y-8">
                    <VBadge>
                        <MapPin class="w-4 h-4" />
                        Tersedia 10+ Cabang di Kota Surabaya
                    </VBadge>

                    <h1 class="text-5xl md:text-7xl font-bold text-ink leading-[1.1] tracking-tight">
                        Berenang Lebih <span class="text-primary">Menyenangkan</span> &amp; Aman Bersama Vaquita!
                    </h1>

                    <p class="text-lg md:text-xl text-slate-600 max-w-xl leading-relaxed">
                        Les renang terpercaya di Surabaya untuk anak-anak hingga dewasa. Instruktur profesional, ramah, dan metode belajar yang fun.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <VBtn variant="primary" href="#harga" size="lg" class="group">
                            Lihat Paket
                            <ArrowRight class="w-5 h-5 group-hover:translate-x-1 transition-transform" />
                        </VBtn>
                        <VBtn variant="outline" href="https://wa.me/6281510425560" external size="lg">
                            <MessageCircle class="w-5 h-5" />
                            Konsultasi via WA
                        </VBtn>
                    </div>
                </div>

                <!-- Image -->
                <div class="w-full md:w-2/5 relative">
                    <div class="relative z-10 w-full aspect-square overflow-hidden blob-shape shadow-2xl">
                        <img :src="heroImg" alt="Swimming Lesson" class="w-full h-full object-cover" />
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-card-lg shadow-xl flex items-center gap-3 z-20">
                        <div class="w-10 h-10 bg-accent-pink rounded-full flex items-center justify-center text-white">
                            <ShieldCheck class="w-5 h-5" />
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-800">100% Aman</p>
                            <p class="text-[10px] text-slate-500">Standar Keselamatan Tinggi</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-0 text-center items-center">
                    <div class="flex flex-col items-center gap-3">
                        <span class="text-5xl md:text-6xl font-extrabold tracking-tight text-primary">500+</span>
                        <p class="text-slate-500 font-bold uppercase tracking-widest text-[10px] md:text-xs">Siswa Aktif</p>
                    </div>
                    <div class="flex flex-col items-center gap-3 md:border-x border-slate-200 py-12 md:py-4">
                        <span class="text-5xl md:text-6xl font-extrabold tracking-tight text-primary">10+</span>
                        <p class="text-slate-500 font-bold uppercase tracking-widest text-[10px] md:text-xs">Pelatih Bersertifikat</p>
                    </div>
                    <div class="flex flex-col items-center gap-3">
                        <span class="text-5xl md:text-6xl font-extrabold tracking-tight text-primary">98%</span>
                        <p class="text-slate-500 font-bold uppercase tracking-widest text-[10px] md:text-xs">Orang Tua Puas</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-24 bg-surface-alt" id="program">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16 space-y-4">
                    <h2 class="text-3xl md:text-4xl font-bold">Kenapa Memilih Vaquita?</h2>
                    <p class="text-slate-500 max-w-2xl mx-auto">Kami mengutamakan kenyamanan dan kemajuan setiap murid dengan pendekatan personal.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-8 rounded-card-lg transition-all duration-300 hover:bg-primary-container hover:-translate-y-2 group">
                        <div class="w-16 h-16 bg-primary-soft/40 rounded-card flex items-center justify-center mb-6 text-primary group-hover:bg-white group-hover:scale-110 transition-all">
                            <GraduationCap class="w-8 h-8" />
                        </div>
                        <h3 class="text-xl font-bold mb-3">Instruktur Profesional &amp; Sabar</h3>
                        <p class="text-slate-500 leading-relaxed">Pelatih kami berpengalaman menghadapi berbagai karakter anak dan dewasa dengan metode edukasi yang lembut.</p>
                    </div>
                    <div class="bg-white p-8 rounded-card-lg transition-all duration-300 hover:bg-primary-container hover:-translate-y-2 group">
                        <div class="w-16 h-16 bg-primary-soft/40 rounded-card flex items-center justify-center mb-6 text-primary group-hover:bg-white group-hover:scale-110 transition-all">
                            <CalendarDays class="w-8 h-8" />
                        </div>
                        <h3 class="text-xl font-bold mb-3">Jadwal &amp; Lokasi Fleksibel</h3>
                        <p class="text-slate-500 leading-relaxed">Pilih waktu latihan yang sesuai dengan kesibukan Anda. Kami bisa datang ke lokasi kolam renang terdekat Anda.</p>
                    </div>
                    <div class="bg-white p-8 rounded-card-lg transition-all duration-300 hover:bg-primary-container hover:-translate-y-2 group">
                        <div class="w-16 h-16 bg-primary-soft/40 rounded-card flex items-center justify-center mb-6 text-primary group-hover:bg-white group-hover:scale-110 transition-all">
                            <Users class="w-8 h-8" />
                        </div>
                        <h3 class="text-xl font-bold mb-3">Aman untuk Segala Usia</h3>
                        <p class="text-slate-500 leading-relaxed">Dari balita usia 3 tahun hingga dewasa yang ingin memperbaiki teknik, semua program dirancang khusus sesuai usia.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="py-24 px-6 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16 space-y-4">
                    <span class="text-primary font-bold tracking-widest uppercase text-sm">Kata Mereka</span>
                    <h2 class="text-3xl md:text-5xl font-bold">Apa Kata Orang Tua &amp; Siswa</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <VTestimonialCard
                        v-for="t in testimonials"
                        :key="t.name"
                        :text="t.text"
                        :name="t.name"
                        :role="t.role"
                        :avatar="t.avatar"
                    />
                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section class="py-24 px-6 max-w-7xl mx-auto" id="harga">
            <div class="text-center mb-16 space-y-4">
                <span class="text-accent-rose font-bold tracking-widest uppercase text-sm">Paket Berenang</span>
                <h2 class="text-3xl md:text-5xl font-bold">Pilih Kelas yang Sesuai Untukmu</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">
                <VPricingCard
                    v-for="pkg in packages"
                    :key="pkg.title"
                    :title="pkg.title"
                    :items="pkg.items"
                    :best-seller="pkg.bestSeller"
                />
            </div>
        </section>

        <!-- Coaches Section -->
        <section class="py-24 overflow-hidden" id="coaches">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col md:flex-row justify-between items-end gap-6 mb-16">
                    <div class="space-y-4">
                        <h2 class="text-3xl md:text-5xl font-bold">Kenalan dengan Pelatih Kami</h2>
                        <p class="text-slate-500 max-w-xl">Dibimbing oleh instruktur yang tidak hanya ahli dalam teknik renang, tapi juga sangat mencintai dunia anak.</p>
                    </div>
                    <div class="flex gap-2">
                        <button @click="scrollCoach(-1)" class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center text-primary hover:bg-primary/5 transition-colors">
                            <ChevronLeft class="w-5 h-5" />
                        </button>
                        <button @click="scrollCoach(1)" class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center text-primary hover:bg-primary/5 transition-colors">
                            <ChevronRight class="w-5 h-5" />
                        </button>
                    </div>
                </div>

                <div ref="coachContainer" class="flex gap-6 overflow-x-auto snap-x snap-mandatory pb-10 pt-4 hide-scrollbar w-full">
                    <VCoachCard
                        v-for="coach in coaches"
                        :key="coach.name"
                        :name="coach.name"
                        :specialty="coach.specialty"
                    />
                    <div class="shrink-0 w-2 lg:w-0"></div>
                </div>
            </div>
        </section>

        <!-- Pre-footer CTA -->
        <section class="py-20 px-6" id="kontak">
            <div class="max-w-6xl mx-auto relative overflow-hidden rounded-card-lg shadow-2xl">
                <div class="flex flex-col md:flex-row min-h-[320px]">
                    <div class="relative z-10 flex flex-col justify-center gap-6 bg-primary px-10 py-14 md:px-14 md:w-3/5">
                        <h2 class="text-3xl md:text-4xl font-bold text-white leading-tight">
                            Siap Menjadi Lincah<br/>Seperti Lumba-lumba?
                        </h2>
                        <p class="text-white/75 text-base max-w-md leading-relaxed">
                            Ayo mulai perjalanan renangmu hari ini. Hubungi tim kami untuk konsultasi gratis.
                        </p>
                        <div>
                            <a href="https://wa.me/6281510425560" target="_blank" class="inline-flex items-center gap-3 bg-white text-primary pl-1 pr-8 py-1 rounded-pill font-bold text-base hover:scale-105 transition-all shadow-lg">
                                <span class="bg-primary-soft text-white rounded-full w-10 h-10 flex items-center justify-center shrink-0">
                                    <ArrowRight class="w-5 h-5" />
                                </span>
                                Hubungi Admin Sekarang
                            </a>
                        </div>
                    </div>
                    <div class="relative md:w-2/5 min-h-[250px] md:min-h-0">
                        <img :src="heroImg" alt="Swimming Lesson" class="absolute inset-0 w-full h-full object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-b md:bg-gradient-to-r from-primary md:via-primary/60 via-primary/80 to-transparent"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <VFooter />

    </div>
</template>
