@extends('layouts.app')

@section('title', 'TAMAYAZ — Équipements Médicaux, Mobilier & Génie Civil à Abidjan, Côte d\'Ivoire')

@section('content')
    @php
        $heroSlides = [
            [
                'image' => asset('images/projects/projet-pharmacie-cocody.jpg'),
                'label' => 'Agencement & Équipement d\'Officines de Pharmacie',
            ],
            [
                'image' => asset('images/products/moniteur-patient.jpg'),
                'label' => 'Équipements de Diagnostic & Monitoring Médical',
            ],
            [
                'image' => asset('images/projects/projet-infirmerie-scolaire.jpg'),
                'label' => 'Mobilier Médical & Dotation Complète d\'Infirmeries',
            ],
            [
                'image' => asset('images/products/chantier-clinique-pharmacie.jpg'),
                'label' => 'Génie Civil, Construction & Réhabilitation Sanitaire',
            ],
        ];
    @endphp

    <!-- Hero Section with Background Carousel -->
    <section id="hero-carousel" class="relative overflow-hidden bg-sky-950 text-white py-20 lg:py-28">
        <!-- Background Slides -->
        <div class="absolute inset-0 z-0">
            @foreach ($heroSlides as $index => $slide)
                <div data-hero-slide="{{ $index }}"
                     class="absolute inset-0 transition-opacity duration-1000 ease-in-out {{ $index === 0 ? 'opacity-100' : 'opacity-0 pointer-events-none' }}">
                    <img src="{{ $slide['image'] }}"
                         alt="{{ $slide['label'] }}"
                         class="w-full h-full object-cover object-center">
                </div>
            @endforeach
            <!-- Solid Blue Translucent Overlay (no gradient) -->
            <div class="absolute inset-0 bg-sky-950/80"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/20 border border-emerald-400/40 text-emerald-300 text-xs sm:text-sm font-bold backdrop-blur-xs">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>Partenaire de référence à Abidjan — Côte d'Ivoire</span>
                    </div>

                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">
                        Équipez et aménagez vos <span class="text-emerald-400">Pharmacies, Infirmeries & Cliniques</span> avec excellence.
                    </h1>

                    <p class="text-base sm:text-lg text-sky-100/95 leading-relaxed max-w-2xl">
                        <strong>TAMAYAZ</strong> est spécialisée dans la promotion et la distribution de <strong>consommables et d'équipements médicaux</strong> de très haute qualité. Nous accompagnons également vos projets de <strong>mobilier médical & professionnel</strong> et de <strong>génie civil</strong>.
                    </p>

                    <div class="pt-2 flex flex-wrap items-center gap-4">
                        <a href="{{ route('catalog.index') }}"
                           class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl font-bold text-slate-950 bg-emerald-400 hover:bg-emerald-300 shadow-lg shadow-emerald-950/30 transition">
                            <span>Explorer le Catalogue</span>
                            <span>→</span>
                        </a>
                        <a href="{{ route('contact.create') }}"
                           class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl font-bold text-white bg-white/15 hover:bg-white/25 border border-white/25 backdrop-blur-xs transition">
                            <span>Demander un Devis Gratuit</span>
                        </a>
                    </div>

                    <!-- Carousel Controls & Active Slide Label -->
                    <div class="pt-4 flex flex-wrap items-center justify-between gap-4 bg-sky-950/60 border border-white/15 backdrop-blur-xs rounded-2xl px-4 py-3">
                        <div class="flex items-center gap-2.5">
                            <span class="inline-block w-2 h-2 rounded-full bg-emerald-400"></span>
                            <span id="hero-slide-caption" class="text-xs sm:text-sm font-semibold text-sky-100">
                                {{ $heroSlides[0]['label'] }}
                            </span>
                        </div>

                        <div class="flex items-center gap-2">
                            @foreach ($heroSlides as $index => $slide)
                                <button type="button"
                                        data-hero-dot="{{ $index }}"
                                        data-hero-label="{{ $slide['label'] }}"
                                        aria-label="Diapositive {{ $index + 1 }}"
                                        class="h-2.5 rounded-full transition-all duration-300 {{ $index === 0 ? 'w-8 bg-emerald-400' : 'w-2.5 bg-white/40 hover:bg-white/70' }}">
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Trust Metrics -->
                    <div class="pt-4 border-t border-white/15 grid grid-cols-3 gap-4 sm:gap-8">
                        <div>
                            <span class="block text-2xl sm:text-3xl font-extrabold text-emerald-400">3 Pôles</span>
                            <span class="text-xs sm:text-sm text-sky-200">Médical, Mobilier & BTP</span>
                        </div>
                        <div>
                            <span class="block text-2xl sm:text-3xl font-extrabold text-white">100%</span>
                            <span class="text-xs sm:text-sm text-sky-200">Qualité & Normes Certifiées</span>
                        </div>
                        <div>
                            <span class="block text-2xl sm:text-3xl font-extrabold text-emerald-400">Abidjan</span>
                            <span class="text-xs sm:text-sm text-sky-200">Livraison & Suivi en RCI</span>
                        </div>
                    </div>
                </div>

                <!-- Hero Right Card: 3 Pôles Quick Access -->
                <div class="lg:col-span-5">
                    <div class="bg-sky-950/75 backdrop-blur-md border border-white/20 rounded-3xl p-6 sm:p-8 space-y-5 shadow-2xl">
                        <div class="flex items-center justify-between border-b border-white/15 pb-4">
                            <div>
                                <span class="text-xs uppercase tracking-wider font-bold text-emerald-300">Offre Globale Intégrée</span>
                                <h2 class="text-xl font-bold text-white">Nos 3 Domaines d'Intervention</h2>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-slate-950">Cocody, Abidjan</span>
                        </div>

                        <div class="space-y-3.5">
                            @foreach ($sectors as $key => $sector)
                                <a href="{{ route('poles.show', $key) }}"
                                   class="block p-4 rounded-2xl bg-white/10 hover:bg-white/20 border border-white/15 transition group">
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <span class="text-xs font-bold uppercase tracking-wider text-emerald-300">{{ $sector['badge'] }}</span>
                                            <h3 class="text-base font-bold text-white group-hover:text-emerald-300 transition mt-0.5">
                                                {{ $sector['name'] }}
                                            </h3>
                                            <p class="text-xs text-sky-100/90 mt-1 line-clamp-2">
                                                {{ $sector['summary'] }}
                                            </p>
                                        </div>
                                        <span class="text-emerald-400 group-hover:translate-x-1 transition font-bold">→</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <div class="pt-2 flex items-center justify-between text-xs text-sky-200">
                            <span>Service commercial direct :</span>
                            <a href="tel:{{ config('tamayaz.phones.primary_tel') }}" class="font-bold text-emerald-300 hover:underline">
                                {{ config('tamayaz.phones.primary') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const slides = document.querySelectorAll('[data-hero-slide]');
                const dots = document.querySelectorAll('[data-hero-dot]');
                const caption = document.getElementById('hero-slide-caption');
                if (!slides.length) return;

                let current = 0;
                let timer = null;

                function showSlide(index) {
                    current = (index + slides.length) % slides.length;
                    slides.forEach((slide, i) => {
                        slide.classList.toggle('opacity-100', i === current);
                        slide.classList.toggle('opacity-0', i !== current);
                        slide.classList.toggle('pointer-events-none', i !== current);
                    });
                    dots.forEach((dot, i) => {
                        dot.className = i === current
                            ? 'h-2.5 w-8 rounded-full transition-all duration-300 bg-emerald-400'
                            : 'h-2.5 w-2.5 rounded-full transition-all duration-300 bg-white/40 hover:bg-white/70';
                    });
                    if (caption && dots[current]) {
                        caption.textContent = dots[current].getAttribute('data-hero-label') || '';
                    }
                }

                function startAutoPlay() {
                    stopAutoPlay();
                    timer = setInterval(() => showSlide(current + 1), 4500);
                }

                function stopAutoPlay() {
                    if (timer) clearInterval(timer);
                }

                dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => {
                        showSlide(index);
                        startAutoPlay();
                    });
                });

                startAutoPlay();
            });
        </script>
    </section>

    <!-- 3 Pôles Section -->
    <section class="py-20 bg-white border-b border-slate-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="text-xs font-bold uppercase tracking-widest text-emerald-600">Une Expertise Multidisciplinaire</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-extrabold text-slate-900">
                    Trois pôles complémentaires pour vos structures sanitaires et professionnelles
                </h2>
                <p class="mt-3 text-slate-600">
                    De la construction ou rénovation de vos locaux jusqu'à l'installation du mobilier et la dotation en équipements et consommables médicaux, TAMAYAZ est votre interlocuteur unique.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                @foreach ($sectors as $key => $sector)
                    <div class="rounded-3xl border border-slate-200 bg-slate-50/60 p-8 flex flex-col justify-between hover:border-sky-300 hover:bg-white hover:shadow-xl transition">
                        <div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-sky-100 text-sky-800">
                                {{ $sector['badge'] }}
                            </span>
                            <h3 class="mt-4 text-2xl font-extrabold text-slate-900">
                                {{ $sector['name'] }}
                            </h3>
                            <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                                {{ $sector['summary'] }}
                            </p>

                            <ul class="mt-6 space-y-2.5">
                                @foreach ($sector['highlights'] as $item)
                                    <li class="flex items-start gap-2.5 text-sm text-slate-700">
                                        <svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>{{ $item }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="mt-8 pt-5 border-t border-slate-200/80 flex items-center justify-between">
                            <a href="{{ route('poles.show', $key) }}" class="text-sm font-bold text-sky-700 hover:text-sky-900">
                                Découvrir ce pôle →
                            </a>
                            <a href="{{ route('catalog.index', ['pole' => $key]) }}" class="text-xs font-semibold text-slate-500 hover:text-emerald-700">
                                Voir les produits
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-12">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-sky-700">Catalogue TAMAYAZ</span>
                    <h2 class="mt-1 text-3xl sm:text-4xl font-extrabold text-slate-900">
                        Équipements, Consommables & Solutions Phares
                    </h2>
                    <p class="mt-2 text-slate-600">
                        Sélection d'équipements médicaux, de mobilier spécialisé et de prestations techniques disponibles sur devis rapide.
                    </p>
                </div>
                <a href="{{ route('catalog.index') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold bg-white border border-slate-300 text-slate-800 hover:border-sky-600 hover:text-sky-700 transition shrink-0">
                    <span>Tout le catalogue</span>
                    <span>→</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($featuredProducts as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- Target Audience Banner: Pharmacies, Infirmeries, Cliniques -->
    <section class="py-20 bg-white border-t border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-6 space-y-5">
                    <span class="text-xs font-bold uppercase tracking-widest text-emerald-600">Pourquoi choisir TAMAYAZ ?</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 leading-tight">
                        Conçu pour répondre aux exigences des pharmacies, infirmeries et chantiers sanitaires
                    </h2>
                    <p class="text-slate-600 leading-relaxed">
                        Basée à <strong>Abidjan (Cocody Riviera Palmeraie, Cité du Bonheur Villa 223)</strong>, notre équipe allie rigueur technique, réactivité commerciale et respect des normes médicales et de construction.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                        <div class="p-4 rounded-2xl bg-sky-50/70 border border-sky-100">
                            <h3 class="font-bold text-slate-900">Pharmacies & Officines</h3>
                            <p class="text-xs text-slate-600 mt-1">Agencement complet, comptoirs, gondoles, tensiomètres et consommables d'officine.</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-emerald-50/70 border border-emerald-100">
                            <h3 class="font-bold text-slate-900">Infirmeries Scolaires & Pro</h3>
                            <p class="text-xs text-slate-600 mt-1">Dotation complète en lits d'observation, divans d'examen, armoires et trousses de secours.</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-100/80 border border-slate-200">
                            <h3 class="font-bold text-slate-900">Cliniques & Centres de Santé</h3>
                            <p class="text-xs text-slate-600 mt-1">Monitoring, autoclaves Classe B, lits médicalisés électriques et stérilisation.</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-amber-50/70 border border-amber-100">
                            <h3 class="font-bold text-slate-900">Génie Civil & Réhabilitation</h3>
                            <p class="text-xs text-slate-600 mt-1">Construction neuve, rénovation, sols hospitaliers et mise aux normes sanitaires.</p>
                        </div>
                    </div>
                </div>

                <!-- Projects Preview -->
                <div class="lg:col-span-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-extrabold text-slate-900">Nos Récentes Réalisations</h3>
                        <a href="{{ route('projects.index') }}" class="text-sm font-bold text-sky-700 hover:underline">Voir toutes nos références →</a>
                    </div>

                    <div class="space-y-4">
                        @foreach ($featuredProjects as $project)
                            <div class="p-4 rounded-2xl border border-slate-200 bg-slate-50 hover:bg-white hover:shadow-md transition flex flex-col sm:flex-row gap-4 items-center">
                                @if ($project->image_url)
                                    <img src="{{ asset($project->image_url) }}"
                                         alt="{{ $project->title }}"
                                         loading="lazy"
                                         class="w-full sm:w-32 h-24 rounded-xl object-cover shrink-0">
                                @endif
                                <div class="grow">
                                    <div class="flex flex-wrap items-center justify-between gap-2 text-xs">
                                        <span class="px-2.5 py-0.5 rounded-full font-bold bg-sky-100 text-sky-800">
                                            {{ $project->sectorLabel() }}
                                        </span>
                                        <span class="text-slate-500 font-medium">{{ $project->location }}</span>
                                    </div>
                                    <h4 class="mt-1.5 text-base font-bold text-slate-900">{{ $project->title }}</h4>
                                    <p class="mt-1 text-xs text-slate-600 line-clamp-2">{{ $project->summary }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Direct Contact & Devis Callout -->
    <section class="py-16 bg-sky-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row items-center justify-between gap-8">
            <div class="space-y-2 max-w-2xl">
                <h2 class="text-2xl sm:text-3xl font-extrabold">
                    Besoin d'un devis pour équiper votre pharmacie, infirmerie ou projet de génie civil ?
                </h2>
                <p class="text-sky-100 text-sm sm:text-base">
                    Contactez notre service commercial au <strong>{{ config('tamayaz.phones.primary') }}</strong> ou au <strong>{{ config('tamayaz.phones.secondary') }}</strong>, ou envoyez votre demande en ligne.
                </p>
            </div>
            <div class="flex flex-wrap items-center gap-4 shrink-0">
                <a href="{{ route('contact.create') }}"
                   class="px-6 py-3.5 rounded-xl font-bold bg-white text-sky-950 hover:bg-emerald-50 shadow-lg transition">
                    Obtenir une Cotation Rapide
                </a>
                <a href="tel:{{ config('tamayaz.phones.primary_tel') }}"
                   class="px-5 py-3.5 rounded-xl font-bold border border-white/30 text-white hover:bg-white/10 transition">
                    Appeler le {{ config('tamayaz.phones.primary') }}
                </a>
            </div>
        </div>
    </section>
@endsection
