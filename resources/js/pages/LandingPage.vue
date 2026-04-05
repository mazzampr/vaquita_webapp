<script setup>
import { ref } from 'vue';
import heroImg from '../hero.png';
import {
    Menu,
    X,
    ArrowRight,
    ShieldCheck,
    GraduationCap,
    CalendarDays,
    Users,
    Star,
    ChevronLeft,
    ChevronRight,
    User,
    MessageCircle,
    ArrowUpRight,
    MapPin,
} from 'lucide-vue-next';

const navOpen = ref(false);

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
</script>

<template>
    <div class="vaquita-app">

        <!-- Header / Navbar (Floating Pill) -->
        <header class="fixed top-0 left-0 right-0 z-50 px-4 py-4 md:px-8">
            <nav class="mx-auto max-w-7xl bg-white/70 backdrop-blur-xl border border-white/20 shadow-[0_8px_32px_0_rgba(0,0,0,0.05)] rounded-full transition-all duration-300">
                <div class="flex justify-between items-center px-6 py-3">
                    <a href="/" class="text-2xl font-bold text-primary tracking-tight flex-shrink-0">Vaquita</a>

                    <div class="hidden md:flex flex-1 justify-center gap-10 items-center font-semibold">
                        <a href="#coaches" class="text-slate-700 hover:text-primary transition-colors duration-300 text-sm">Our Coach</a>
                        <a href="#harga" class="text-slate-700 hover:text-primary transition-colors duration-300 text-sm">Harga</a>
                        <a href="#kontak" class="text-slate-700 hover:text-primary transition-colors duration-300 text-sm">Kontak</a>
                    </div>

                    <div class="hidden md:flex flex-shrink-0 items-center gap-2">
                        <router-link :to="{ name: 'login' }" class="mr-1 border-2 border-primary/20 text-primary px-6 py-2 rounded-full font-bold text-sm transition-all hover:bg-primary/5 active:scale-95">
                            Login
                        </router-link>
                        <a href="https://wa.me/6281510425560" class="bg-primary hover:opacity-90 text-white px-7 py-2.5 rounded-full font-bold text-sm transition-all shadow-md hover:shadow-lg active:scale-95">
                            Daftar Sekarang
                        </a>
                    </div>

                    <!-- Mobile Menu Icon -->
                    <button @click="navOpen = !navOpen" class="md:hidden text-primary p-2">
                        <Menu v-if="!navOpen" class="w-6 h-6" />
                        <X v-else class="w-6 h-6" />
                    </button>
                </div>
            </nav>

            <!-- Mobile Nav Dropdown -->
            <div v-if="navOpen" class="absolute left-4 right-4 top-[80px] bg-white rounded-2xl shadow-xl border border-slate-100 p-4 md:hidden">
                <div class="flex flex-col space-y-3 px-2">
                    <a @click="navOpen=false" href="#coaches" class="font-semibold text-slate-700">Our Coach</a>
                    <a @click="navOpen=false" href="#harga" class="font-semibold text-slate-700">Harga</a>
                    <a @click="navOpen=false" href="#kontak" class="font-semibold text-slate-700">Kontak</a>
                    <hr class="border-slate-100">
                    <router-link :to="{ name: 'login' }" class="text-center font-bold rounded-full border-2 border-primary px-5 py-2.5 text-primary">Login</router-link>
                    <a @click="navOpen=false" href="https://wa.me/6281510425560" class="text-center font-bold rounded-full bg-primary px-5 py-2.5 text-white shadow">Daftar Sekarang</a>
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="relative isolate overflow-hidden pt-32 pb-20 px-6 md:px-12 lg:px-24">
            <!-- Background Blobs -->
            <div class="absolute top-[-10%] right-[-5%] w-[400px] h-[400px] bg-[#92f5d7] opacity-30 blob-shape -z-10"></div>
            <div class="absolute bottom-0 left-[-5%] w-[300px] h-[300px] bg-[#c2ebe0] opacity-40 blob-shape -z-10"></div>

            <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-16">
                <div class="w-full md:w-3/5 space-y-8">
                    <div class="inline-flex items-center gap-2 bg-primary/10 px-4 py-1.5 rounded-full">
                        <MapPin class="w-4 h-4 text-primary" />
                        <span class="text-primary text-xs uppercase tracking-widest font-bold">Tersedia 10+ Cabang di Kota Surabaya</span>
                    </div>

                    <h1 class="text-5xl md:text-7xl font-bold text-on-surface leading-[1.1] tracking-tight">
                        Berenang Lebih <span class="text-primary">Menyenangkan</span> &amp; Aman Bersama Vaquita!
                    </h1>

                    <p class="text-lg md:text-xl text-slate-600 max-w-xl leading-relaxed">
                        Les renang terpercaya di Surabaya untuk anak-anak hingga dewasa. Instruktur profesional, ramah, dan metode belajar yang fun.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="#harga" class="hero-gradient text-white px-8 py-4 rounded-full font-bold text-center shadow-lg hover:brightness-110 transition-all flex items-center justify-center gap-2 group">
                            Lihat Paket
                            <ArrowRight class="w-5 h-5 group-hover:translate-x-1 transition-transform" />
                        </a>
                        <a href="https://wa.me/6281510425560" target="_blank" class="border-2 border-slate-200 px-8 py-4 rounded-full font-bold text-primary text-center hover:bg-surface-container-low transition-all flex items-center justify-center gap-2">
                            <MessageCircle class="w-5 h-5" />
                            Konsultasi via WA
                        </a>
                    </div>
                </div>

                <div class="w-full md:w-2/5 relative">
                    <div class="relative z-10 w-full aspect-square overflow-hidden blob-shape shadow-2xl">
                        <img :src="heroImg" alt="Swimming Lesson" class="w-full h-full object-cover" />
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl flex items-center gap-3 z-20">
                        <div class="w-10 h-10 bg-[#e67f96] rounded-full flex items-center justify-center text-white">
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
        <section class="py-24 bg-[#f2f4f3]" id="program">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16 space-y-4">
                    <h2 class="text-3xl md:text-4xl font-bold">Kenapa Memilih Vaquita?</h2>
                    <p class="text-slate-500 max-w-2xl mx-auto">Kami mengutamakan kenyamanan dan kemajuan setiap murid dengan pendekatan personal.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-8 rounded-2xl transition-all duration-300 hover:bg-[#c2ebe0] hover:-translate-y-2 group">
                        <div class="w-16 h-16 bg-[#75d8bb] rounded-2xl flex items-center justify-center mb-6 text-primary group-hover:bg-white group-hover:scale-110 transition-all">
                            <GraduationCap class="w-8 h-8" />
                        </div>
                        <h3 class="text-xl font-bold mb-3">Instruktur Profesional &amp; Sabar</h3>
                        <p class="text-slate-500 leading-relaxed">Pelatih kami berpengalaman menghadapi berbagai karakter anak dan dewasa dengan metode edukasi yang lembut.</p>
                    </div>
                    <div class="bg-white p-8 rounded-2xl transition-all duration-300 hover:bg-[#c2ebe0] hover:-translate-y-2 group">
                        <div class="w-16 h-16 bg-[#75d8bb] rounded-2xl flex items-center justify-center mb-6 text-primary group-hover:bg-white group-hover:scale-110 transition-all">
                            <CalendarDays class="w-8 h-8" />
                        </div>
                        <h3 class="text-xl font-bold mb-3">Jadwal &amp; Lokasi Fleksibel</h3>
                        <p class="text-slate-500 leading-relaxed">Pilih waktu latihan yang sesuai dengan kesibukan Anda. Kami bisa datang ke lokasi kolam renang terdekat Anda.</p>
                    </div>
                    <div class="bg-white p-8 rounded-2xl transition-all duration-300 hover:bg-[#c2ebe0] hover:-translate-y-2 group">
                        <div class="w-16 h-16 bg-[#75d8bb] rounded-2xl flex items-center justify-center mb-6 text-primary group-hover:bg-white group-hover:scale-110 transition-all">
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
                    <div v-for="t in testimonials" :key="t.name" class="bg-[#f8faf9] p-8 rounded-2xl shadow-sm border border-slate-100">
                        <div class="flex text-yellow-400 mb-4">
                            <Star v-for="i in 5" :key="i" class="w-5 h-5" fill="currentColor" />
                        </div>
                        <p class="text-slate-500 italic mb-8 leading-relaxed">"{{ t.text }}"</p>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-[#c2ebe0] flex items-center justify-center font-bold text-primary text-sm">{{ t.avatar }}</div>
                            <div>
                                <p class="font-bold text-sm">{{ t.name }}</p>
                                <p class="text-xs text-slate-500">{{ t.role }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section class="py-24 px-6 max-w-7xl mx-auto" id="harga">
            <div class="text-center mb-16 space-y-4">
                <span class="text-[#994158] font-bold tracking-widest uppercase text-sm">Paket Berenang</span>
                <h2 class="text-3xl md:text-5xl font-bold">Pilih Kelas yang Sesuai Untukmu</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">
                <div v-for="pkg in packages" :key="pkg.title"
                    :class="['p-8 rounded-2xl shadow-sm flex flex-col relative',
                        pkg.bestSeller
                            ? 'bg-white shadow-lg border-2 border-primary'
                            : 'bg-white border border-slate-100']">
                    <div v-if="pkg.bestSeller" class="absolute -top-4 left-1/2 -translate-x-1/2 bg-[#994158] text-white px-4 py-1 rounded-full text-xs font-bold whitespace-nowrap">
                        BEST SELLER
                    </div>
                    <h3 class="text-lg font-bold mb-4 min-h-[3.5rem]">{{ pkg.title }}</h3>
                    <ul class="space-y-4 mb-8 flex-grow">
                        <li v-for="item in pkg.items" :key="item.label"
                            :class="['flex justify-between items-start gap-2', item.highlight ? 'bg-[#c2ebe0]/30 p-2 rounded-lg' : '']">
                            <span :class="['text-sm', item.highlight ? 'font-bold' : 'text-slate-500']">{{ item.label }}</span>
                            <span :class="['font-bold shrink-0', item.special ? 'text-[#994158]' : 'text-primary']">{{ item.price }}</span>
                        </li>
                    </ul>
                    <a href="https://wa.me/6281510425560" target="_blank"
                        :class="['w-full py-3 rounded-full font-bold text-center transition-all',
                            pkg.bestSeller
                                ? 'bg-primary text-white hover:brightness-110'
                                : 'border-2 border-primary text-primary hover:bg-primary hover:text-white']">
                        Pilih Paket
                    </a>
                </div>
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
                        <button @click="$refs.coachContainer.scrollBy({ left: -300, behavior: 'smooth' })" class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center text-primary hover:bg-primary/5 transition-colors">
                            <ChevronLeft class="w-5 h-5" />
                        </button>
                        <button @click="$refs.coachContainer.scrollBy({ left: 300, behavior: 'smooth' })" class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center text-primary hover:bg-primary/5 transition-colors">
                            <ChevronRight class="w-5 h-5" />
                        </button>
                    </div>
                </div>

                <div ref="coachContainer" class="flex gap-6 overflow-x-auto snap-x snap-mandatory pb-10 pt-4 hide-scrollbar w-full" style="-ms-overflow-style: none; scrollbar-width: none;">
                    <div v-for="coach in coaches" :key="coach.name" class="group relative flex-none w-[280px] lg:w-[280px] snap-center">
                        <div class="aspect-[3/4] rounded-2xl overflow-hidden mb-4 grayscale group-hover:grayscale-0 transition-all duration-500 bg-[#c2ebe0] flex items-center justify-center shadow-sm hover:shadow-md">
                            <div class="text-center px-6">
                                <div class="w-24 h-24 rounded-full bg-primary/20 flex items-center justify-center mx-auto mb-4">
                                    <User class="w-12 h-12 text-primary" />
                                </div>
                                <p class="font-bold text-primary">{{ coach.name }}</p>
                                <p class="text-xs text-slate-500 mt-1">{{ coach.specialty }}</p>
                            </div>
                        </div>
                        <div class="absolute bottom-4 left-4 right-4 bg-white/90 backdrop-blur p-3 rounded-xl transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all shadow-lg border border-slate-100">
                            <p class="font-bold text-sm text-slate-800">{{ coach.name }}</p>
                            <p class="text-xs text-slate-500">{{ coach.specialty }}</p>
                        </div>
                    </div>
                    <!-- Spacer to prevent clipping on the right edge when fully scrolled -->
                    <div class="shrink-0 w-2 lg:w-0"></div>
                </div>
            </div>
        </section>

        <!-- Pre-footer CTA -->
        <section class="py-20 px-6" id="kontak">
            <div class="max-w-6xl mx-auto relative overflow-hidden rounded-[2rem] shadow-2xl">
                <div class="flex flex-col md:flex-row min-h-[320px]">
                    <div class="relative z-10 flex flex-col justify-center gap-6 bg-[#006b56] px-10 py-14 md:px-14 md:w-3/5">
                        <h2 class="text-3xl md:text-4xl font-bold text-white leading-tight">Siap Menjadi Lincah<br/>Seperti Lumba-lumba?</h2>
                        <p class="text-white/75 text-base max-w-md leading-relaxed">Ayo mulai perjalanan renangmu hari ini. Hubungi tim kami untuk konsultasi gratis.</p>
                        <div>
                            <a href="https://wa.me/6281510425560" target="_blank" class="inline-flex items-center gap-3 bg-white text-[#006b56] pl-1 pr-8 py-1 rounded-full font-bold text-base hover:scale-105 transition-all shadow-lg group">
                                <span class="bg-[#4aaf94] text-white rounded-full w-10 h-10 flex items-center justify-center shrink-0">
                                    <ArrowRight class="w-5 h-5" />
                                </span>
                                Hubungi Admin Sekarang
                            </a>
                        </div>
                    </div>
                    <div class="relative md:w-2/5 min-h-[250px] md:min-h-0">
                        <img :src="heroImg" alt="Swimming Lesson" class="absolute inset-0 w-full h-full object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-b md:bg-gradient-to-r from-[#006b56] md:via-[#006b56]/60 via-[#006b56]/80 to-transparent"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-slate-50 w-full rounded-t-[3rem] mt-8">
            <div class="flex flex-col items-center py-16 px-8 gap-8 w-full text-center max-w-7xl mx-auto">
                <div class="text-xl font-bold text-primary">Vaquita</div>
                <div class="flex flex-wrap justify-center gap-x-8 gap-y-4 text-sm">
                    <a href="https://instagram.com/lesrenang.vaquita" class="text-slate-500 hover:text-primary transition-all">Instagram</a>
                    <a href="https://wa.me/6281510425560" class="text-slate-500 hover:text-primary transition-all">WhatsApp</a>
                    <a href="#" class="text-slate-500 hover:text-primary transition-all">TikTok</a>
                    <a href="#program" class="text-slate-500 hover:text-primary transition-all">Program</a>
                    <a href="#harga" class="text-slate-500 hover:text-primary transition-all">Harga</a>
                    <a href="#kontak" class="text-slate-500 hover:text-primary transition-all">Kontak</a>
                </div>
                <div class="h-px w-24 bg-slate-200"></div>
                <p class="text-slate-500 text-sm max-w-md">
                    © {{ new Date().getFullYear() }} Les Renang Vaquita Surabaya. All rights reserved.<br/>
                    Profesional, Ramah, dan Terpercaya di Seluruh Surabaya.
                </p>
            </div>
        </footer>

    </div>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Be+Vietnam+Pro:wght@300;400;500;600&display=swap');

:root {
  --primary: #006b56;
  --primary-container: #4aaf94;
  --background: #f8faf9;
  --on-surface: #191c1c;
}

.vaquita-app {
  font-family: 'Be Vietnam Pro', sans-serif;
  background-color: #f8faf9;
  color: #191c1c;
}

.text-primary { color: var(--primary); }
.bg-primary { background-color: var(--primary); }
.border-primary { border-color: var(--primary); }
.hover\:bg-primary:hover { background-color: var(--primary); }
.hover\:text-primary:hover { color: var(--primary); }

.blob-shape {
  border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
}

.hero-gradient {
  background: linear-gradient(135deg, #006b56 0%, #4aaf94 100%);
}

.bg-surface-container-low {
  background-color: #f2f4f3;
}

.hide-scrollbar::-webkit-scrollbar {
  display: none;
}
</style>
