<script setup>
const serviceStats = [
    { title: 'Architecture Experience', value: '20+ Year', desc: 'Merancang solusi ruang yang fungsional dan estetis.' },
    { title: 'Project Management', value: '25+ Year', desc: 'Eksekusi proyek dari konsep sampai handover.' },
    { title: 'Construction Experience', value: '15+ Year', desc: 'Kontrol kualitas konstruksi dengan standar tinggi.' },
];

const services = [
    'Building planning and design',
    'Architectural design consulting',
    'Construction supervision',
    'Interior design for residential and commercial spaces',
    'Renovation and remodelling',
    'Renovating old spaces for improved functionality and aesthetics',
];

const reviews = [
    '“Tim sangat detail dan hasil desainnya selalu relevan dengan kebutuhan pengguna.”',
    '“Timeline rapi, komunikasi cepat, dan kualitas implementasi konsisten.”',
];
</script>

<template>
    <div class="min-h-screen bg-[var(--color-surface)] px-4 py-6 md:px-8 md:py-8">
        <main class="architect-grid mx-auto max-w-[1280px] rounded-[34px] bg-white p-4 md:p-6">
            <header class="rounded-2xl border border-slate-200 bg-white">
                <div class="flex items-center justify-between px-4 py-4 md:px-7">
                    <a
                        href="#home"
                        class="display-heading text-2xl font-bold text-[var(--color-brand)]"
                    >
                        SKLR
                    </a>
                    <nav class="hidden items-center gap-7 text-xs font-semibold uppercase tracking-wide text-slate-700 md:flex">
                        <a href="#home" class="text-[var(--color-brand)]">Home</a>
                        <a href="#about" class="hover:text-[var(--color-brand)]">About</a>
                        <a href="#review" class="hover:text-[var(--color-brand)]">Review</a>
                        <a href="#contact" class="hover:text-[var(--color-brand)]">Contact</a>
                    </nav>
                    <router-link
                        :to="{ name: 'login' }"
                        class="rounded-full border border-slate-300 px-4 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-100"
                    >
                        Free Consultation
                    </router-link>
                </div>
            </header>

            <section
                id="home"
                class="hero-image mt-4 overflow-hidden rounded-[28px] px-5 py-8 text-white md:px-10 md:py-14"
            >
                <div class="grid gap-8 md:grid-cols-12">
                    <div class="md:col-span-7">
                        <p class="text-sm text-white/85">Form • Fit • Function</p>
                        <h1 class="display-heading mt-3 max-w-[520px] text-4xl leading-tight md:text-6xl">
                            Kami Merancang Dari Manusia
                        </h1>
                        <p class="mt-4 max-w-[480px] text-sm text-white/85 md:text-base">
                            Bagi kami, desain bukan sekadar bentuk dan gaya. Desain adalah interaksi harian yang nyaman, fungsional, dan bernilai.
                        </p>
                        <router-link
                            :to="{ name: 'login' }"
                            class="mt-6 inline-flex items-center gap-2 rounded-full bg-white px-5 py-2.5 text-sm font-bold text-slate-800"
                        >
                            Explore Platform
                            <span>↗</span>
                        </router-link>
                    </div>
                </div>
            </section>

            <section
                id="about"
                class="mt-7 border-x border-slate-200 bg-white px-2 py-7 md:px-4"
            >
                <div class="grid gap-6 md:grid-cols-12">
                    <div class="md:col-span-3">
                        <p class="text-xs uppercase tracking-[0.22em] text-slate-500">Our Services</p>
                    </div>
                    <div class="md:col-span-9">
                        <h2 class="display-heading text-3xl leading-tight text-slate-900 md:text-5xl">
                            Experience The Art Of Build Not Only Space, But Future
                        </h2>
                        <p class="mt-3 max-w-3xl text-sm text-slate-600">
                            Kami fokus pada desain dan konstruksi yang menyeimbangkan empati pengguna, estetika, dan kebutuhan operasional.
                        </p>
                    </div>
                </div>

                <div class="mt-8 grid gap-4 md:grid-cols-3">
                    <article
                        v-for="stat in serviceStats"
                        :key="stat.title"
                        class="border border-slate-200 bg-white p-4"
                    >
                        <p class="text-[11px] uppercase tracking-[0.18em] text-slate-500">{{ stat.title }}</p>
                        <p class="display-heading mt-2 text-3xl text-slate-900">{{ stat.value }}</p>
                        <p class="mt-2 text-sm text-slate-600">{{ stat.desc }}</p>
                    </article>
                </div>

                <div class="mt-6 grid gap-4 md:grid-cols-12">
                    <div class="service-image relative min-h-[280px] overflow-hidden rounded-xl md:col-span-6">
                        <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                            <p class="text-xs uppercase tracking-wide">Building planning and design</p>
                            <p class="mt-1 text-sm text-white/85">Independent design & build construction.</p>
                        </div>
                    </div>
                    <div class="rounded-xl border border-slate-200 md:col-span-6">
                        <ul class="divide-y divide-slate-200">
                            <li
                                v-for="(service, idx) in services"
                                :key="service"
                                class="flex items-center justify-between px-4 py-3 text-sm"
                            >
                                <span>
                                    <span class="mr-2 text-slate-400">{{ String(idx + 1).padStart(2, '0') }}</span>
                                    <span class="font-semibold text-slate-800">{{ service }}</span>
                                </span>
                                <span class="text-slate-500">↗</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <section
                id="review"
                class="mt-8 grid gap-4 md:grid-cols-2"
            >
                <article
                    v-for="quote in reviews"
                    :key="quote"
                    class="rounded-2xl border border-slate-200 bg-slate-50 p-6"
                >
                    <p class="text-lg leading-relaxed text-slate-700">{{ quote }}</p>
                </article>
            </section>

            <section
                id="contact"
                class="mt-8 rounded-2xl border border-slate-200 bg-white p-6 text-slate-700 md:p-8"
            >
                <h3 class="display-heading text-4xl text-slate-900">Contact</h3>
                <div class="mt-4 grid gap-4 text-sm md:grid-cols-3">
                    <p>Email: hello@lesrenang.id</p>
                    <p>Whatsapp: +62 812-3456-7890</p>
                    <p>Jl. Pantai Indah No. 12, Jakarta</p>
                </div>
            </section>

            <footer class="mt-8 border-t border-slate-200 pt-5 text-sm text-slate-500">
                <div class="flex flex-col gap-1 md:flex-row md:items-center md:justify-between">
                    <p>&copy; {{ new Date().getFullYear() }} Sistem Kelola Les Renang</p>
                    <p>Built with human-centered design approach.</p>
                </div>
            </footer>
        </main>
    </div>
</template>
