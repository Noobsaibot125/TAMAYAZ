@extends('layouts.app')

@section('title', $product->name.' — Catalogue TAMAYAZ Abidjan')

@section('content')
    <section class="py-12 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <!-- Breadcrumb -->
            <nav class="text-xs sm:text-sm text-slate-500 flex flex-wrap items-center gap-2">
                <a href="{{ route('home') }}" class="hover:text-sky-700">Accueil</a>
                <span>/</span>
                <a href="{{ route('catalog.index') }}" class="hover:text-sky-700">Catalogue</a>
                @if ($product->category)
                    <span>/</span>
                    <a href="{{ route('catalog.index', ['categorie' => $product->category->slug]) }}" class="hover:text-sky-700">
                        {{ $product->category->name }}
                    </a>
                @endif
                <span>/</span>
                <span class="font-semibold text-slate-800">{{ $product->name }}</span>
            </nav>

            <!-- Product Main Card -->
            <div class="bg-white rounded-3xl border border-slate-200 p-6 sm:p-10 shadow-xs">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                    <!-- Visual Presentation -->
                    <div class="lg:col-span-5">
                        <div class="relative h-full min-h-80 rounded-2xl bg-sky-950 p-6 text-white flex flex-col justify-between overflow-hidden">
                            @if ($product->image_url)
                                <img src="{{ asset($product->image_url) }}"
                                     alt="{{ $product->name }}"
                                     class="absolute inset-0 w-full h-full object-cover">
                                <div class="absolute inset-0 bg-slate-950/35"></div>
                            @endif

                            <div class="relative z-10 flex items-center justify-between gap-2">
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-slate-950/75 text-white">
                                    {{ $product->category?->sectorLabel() }}
                                </span>
                                @if ($product->badge)
                                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-400 text-slate-950">
                                        {{ $product->badge }}
                                    </span>
                                @endif
                            </div>

                            @if (! $product->image_url)
                                <div class="relative z-10 my-auto py-8 text-center space-y-3">
                                    <div class="w-20 h-20 mx-auto rounded-2xl bg-white/15 flex items-center justify-center">
                                        <svg class="w-10 h-10 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-semibold text-sky-200">Garantie & Qualité Certifiée TAMAYAZ</p>
                                </div>
                            @endif

                            <div class="relative z-10 flex items-center justify-between text-xs text-white bg-slate-950/75 backdrop-blur-xs rounded-xl px-4 py-2.5">
                                <span>Réf : <strong>{{ $product->reference ?? 'TMZ-PRO' }}</strong></span>
                                <span class="text-emerald-300 font-bold">
                                    {{ $product->in_stock ? '✓ Disponible' : 'Sur commande' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Product Details & Specifications -->
                    <div class="lg:col-span-7 space-y-6">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-emerald-600">
                                {{ $product->category?->name }}
                            </span>
                            <h1 class="mt-1 text-2xl sm:text-4xl font-extrabold text-slate-900">
                                {{ $product->name }}
                            </h1>
                            <p class="mt-3 text-base font-medium text-slate-700">
                                {{ $product->short_description }}
                            </p>
                        </div>

                        <div class="prose prose-slate max-w-none text-sm text-slate-600 leading-relaxed">
                            <p>{{ $product->description }}</p>
                        </div>

                        @if (! empty($product->specifications))
                            <div class="border-t border-slate-200 pt-6">
                                <h2 class="text-sm font-bold uppercase tracking-wider text-slate-900 mb-3">
                                    Caractéristiques & Spécifications Techniques
                                </h2>
                                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    @foreach ($product->specifications as $specKey => $specVal)
                                        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80">
                                            <dt class="text-xs font-semibold text-slate-500">{{ $specKey }}</dt>
                                            <dd class="text-sm font-bold text-slate-900 mt-0.5">{{ $specVal }}</dd>
                                        </div>
                                    @endforeach
                                </dl>
                            </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="pt-4 border-t border-slate-200 flex flex-wrap items-center gap-4">
                            <a href="{{ route('contact.create', ['produit' => $product->slug]) }}"
                               class="px-6 py-3.5 rounded-xl font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-md transition">
                                Demander un Devis pour ce produit
                            </a>
                            <a href="tel:{{ config('tamayaz.phones.primary_tel') }}"
                               class="px-5 py-3.5 rounded-xl font-bold text-slate-800 bg-slate-100 hover:bg-slate-200 transition">
                                Appeler le {{ config('tamayaz.phones.primary') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            @if ($relatedProducts->isNotEmpty())
                <div>
                    <h2 class="text-2xl font-extrabold text-slate-900 mb-6">Autres équipements dans la même catégorie</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @foreach ($relatedProducts as $related)
                            <x-product-card :product="$related" />
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
