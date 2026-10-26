<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'TAMAYAZ - Équipements Médicaux, Mobilier & Génie Civil à Abidjan')</title>
    <meta name="description" content="@yield('meta_description', config('tamayaz.description'))">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-slate-50 text-slate-900 antialiased selection:bg-emerald-600 selection:text-white">

    <!-- Top Info Bar -->
    <div class="bg-sky-950 text-sky-100 text-xs sm:text-sm border-b border-sky-900/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2.5 flex flex-wrap items-center justify-between gap-3">
            <div class="flex flex-wrap items-center gap-4 sm:gap-6">
                <span class="inline-flex items-center gap-1.5 text-sky-200">
                    <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>Riviera Palmeraie Sicogi, Cité du Bonheur Villa 223 — Cocody, Abidjan</span>
                </span>
                <span class="hidden md:inline-flex items-center gap-1.5 text-sky-300">
                    <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>{{ config('tamayaz.hours.weekdays') }}</span>
                </span>
            </div>

            <div class="flex items-center gap-4 ml-auto">
                <a href="tel:{{ config('tamayaz.phones.primary_tel') }}" class="inline-flex items-center gap-1.5 font-semibold text-white hover:text-emerald-300 transition">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span>{{ config('tamayaz.phones.primary') }}</span>
                </a>
                <span class="text-sky-700 hidden sm:inline">|</span>
                <a href="tel:{{ config('tamayaz.phones.secondary_tel') }}" class="hidden sm:inline-flex items-center gap-1 font-medium text-sky-200 hover:text-white transition">
                    <span>{{ config('tamayaz.phones.secondary') }}</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Header -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20 gap-4">
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-sky-700 to-emerald-600 flex items-center justify-center text-white shadow-md shadow-sky-900/15 group-hover:scale-105 transition">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <div>
                        <span class="block text-xl sm:text-2xl font-extrabold tracking-tight text-sky-950">
                            TAMA<span class="text-emerald-600">YAZ</span>
                        </span>
                        <span class="block text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                            Médical • Mobilier • Génie Civil
                        </span>
                    </div>
                </a>

                <!-- Desktop Links -->
                <nav class="hidden lg:flex items-center gap-1">
                    <a href="{{ route('home') }}"
                       class="px-3.5 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('home') ? 'bg-sky-50 text-sky-700' : 'text-slate-700 hover:text-sky-700 hover:bg-slate-50' }}">
                        Accueil
                    </a>
                    <a href="{{ route('poles.index') }}"
                       class="px-3.5 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('poles.*') ? 'bg-sky-50 text-sky-700' : 'text-slate-700 hover:text-sky-700 hover:bg-slate-50' }}">
                        Nos 3 Pôles d'Expertise
                    </a>
                    <a href="{{ route('catalog.index') }}"
                       class="px-3.5 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('catalog.*') ? 'bg-sky-50 text-sky-700' : 'text-slate-700 hover:text-sky-700 hover:bg-slate-50' }}">
                        Catalogue & Équipements
                    </a>
                    <a href="{{ route('projects.index') }}"
                       class="px-3.5 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('projects.*') ? 'bg-sky-50 text-sky-700' : 'text-slate-700 hover:text-sky-700 hover:bg-slate-50' }}">
                        Réalisations
                    </a>
                    <a href="{{ route('about') }}"
                       class="px-3.5 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('about') ? 'bg-sky-50 text-sky-700' : 'text-slate-700 hover:text-sky-700 hover:bg-slate-50' }}">
                        À Propos
                    </a>
                    <a href="{{ route('contact.create') }}"
                       class="px-3.5 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('contact.*') ? 'bg-sky-50 text-sky-700' : 'text-slate-700 hover:text-sky-700 hover:bg-slate-50' }}">
                        Contact
                    </a>
                </nav>

                <!-- CTA Buttons -->
                <div class="hidden sm:flex items-center gap-3">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-bold uppercase tracking-wider bg-slate-100 text-slate-700 hover:bg-slate-200 transition">
                            <span>Admin</span>
                        </a>
                    @endauth
                    <a href="{{ route('contact.create') }}"
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-sm transition">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span>Demander un Devis</span>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button type="button"
                        onclick="document.getElementById('mobile-nav').classList.toggle('hidden')"
                        class="lg:hidden inline-flex items-center justify-center p-2.5 rounded-xl text-slate-700 hover:bg-slate-100 focus:outline-none"
                        aria-label="Menu principal">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Drawer -->
        <div id="mobile-nav" class="hidden lg:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-5 space-y-2">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-slate-800 hover:bg-sky-50">Accueil</a>
            <a href="{{ route('poles.index') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-slate-800 hover:bg-sky-50">Nos 3 Pôles d'Expertise</a>
            <a href="{{ route('catalog.index') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-slate-800 hover:bg-sky-50">Catalogue & Équipements</a>
            <a href="{{ route('projects.index') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-slate-800 hover:bg-sky-50">Réalisations</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-slate-800 hover:bg-sky-50">À Propos</a>
            <a href="{{ route('contact.create') }}" class="block px-3 py-2.5 rounded-xl text-center font-bold text-white bg-emerald-600 hover:bg-emerald-700">Demander un Devis Gratuit</a>
        </div>
    </header>

    <!-- Main Page Content -->
    <main class="grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-sky-950 text-sky-100 border-t border-sky-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                <!-- Col 1: Brand -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 to-emerald-500 flex items-center justify-center text-white font-bold">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                        <span class="text-2xl font-extrabold tracking-tight text-white">
                            TAMA<span class="text-emerald-400">YAZ</span>
                        </span>
                    </div>
                    <p class="text-sm text-sky-200/90 leading-relaxed">
                        Promotion et distribution de consommables et équipements médicaux de haute qualité pour pharmacies, infirmeries et cliniques. Expertise reconnue en mobilier et génie civil en Côte d'Ivoire.
                    </p>
                    <div class="pt-1 flex items-center gap-2 text-xs text-emerald-300 font-semibold">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        <span>Partenaire des structures sanitaires & entreprises</span>
                    </div>
                </div>

                <!-- Col 2: Nos Pôles -->
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-wider text-white mb-4">Nos Pôles d'Activité</h3>
                    <ul class="space-y-2.5 text-sm text-sky-200">
                        <li>
                            <a href="{{ route('poles.show', 'medical') }}" class="hover:text-emerald-300 transition flex items-center gap-2">
                                <span class="text-emerald-400">→</span> Équipements & Consommables Médicaux
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('poles.show', 'mobilier') }}" class="hover:text-emerald-300 transition flex items-center gap-2">
                                <span class="text-emerald-400">→</span> Mobilier Médical & d'Officine
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('poles.show', 'genie_civil') }}" class="hover:text-emerald-300 transition flex items-center gap-2">
                                <span class="text-emerald-400">→</span> Génie Civil & Aménagement BTP
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('catalog.index') }}" class="hover:text-emerald-300 transition flex items-center gap-2">
                                <span class="text-emerald-400">→</span> Catalogue Complet des Produits
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Col 3: Navigation Rapide -->
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-wider text-white mb-4">Accès Rapide</h3>
                    <ul class="space-y-2.5 text-sm text-sky-200">
                        <li><a href="{{ route('about') }}" class="hover:text-emerald-300 transition">Présentation de TAMAYAZ</a></li>
                        <li><a href="{{ route('projects.index') }}" class="hover:text-emerald-300 transition">Nos Références & Réalisations</a></li>
                        <li><a href="{{ route('contact.create') }}" class="hover:text-emerald-300 transition">Demander une Cotation / Devis</a></li>
                        <li><a href="{{ route('admin.login') }}" class="hover:text-emerald-300 transition">Accès Administration</a></li>
                    </ul>
                </div>

                <!-- Col 4: Coordonnées Abidjan -->
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-wider text-white mb-4">Siège Social — Abidjan</h3>
                    <ul class="space-y-3 text-sm text-sky-200">
                        <li class="flex items-start gap-2.5">
                            <svg class="w-5 h-5 text-emerald-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>
                                Rue Lumière, Villa 223, Cité du Bonheur<br>
                                Riviera Palmeraie Sicogi, Cocody<br>
                                Abidjan — Côte d'Ivoire ({{ config('tamayaz.address.postal_box') }})
                            </span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <div>
                                <a href="tel:{{ config('tamayaz.phones.primary_tel') }}" class="block font-semibold text-white hover:text-emerald-300">{{ config('tamayaz.phones.primary') }}</a>
                                <a href="tel:{{ config('tamayaz.phones.secondary_tel') }}" class="block text-sky-300 hover:text-white">{{ config('tamayaz.phones.secondary') }}</a>
                            </div>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <a href="mailto:{{ config('tamayaz.email') }}" class="hover:text-emerald-300">{{ config('tamayaz.email') }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-sky-900/80 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-sky-300">
                <p>© {{ date('Y') }} <strong>TAMAYAZ Côte d'Ivoire</strong>. Tous droits réservés.</p>
                <p>Équipements Médicaux • Consommables • Mobilier • Génie Civil — Cocody Riviera Palmeraie, Abidjan</p>
            </div>
        </div>
    </footer>

</body>
</html>
