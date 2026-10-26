@extends('layouts.app')

@section('title', $pole['name'].' — TAMAYAZ Abidjan')

@section('content')
    <section class="bg-sky-950 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('poles.index') }}" class="text-xs font-bold uppercase tracking-wider text-emerald-300 hover:underline">
                ← Retour aux 3 Pôles d'Expertise
            </a>
            <div class="mt-3">
                <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                    {{ $pole['badge'] }}
                </span>
            </div>
            <h1 class="mt-3 text-3xl sm:text-5xl font-extrabold">{{ $pole['name'] }}</h1>
            <p class="mt-4 text-lg text-sky-100 max-w-3xl">{{ $pole['summary'] }}</p>

            <div class="mt-6 flex flex-wrap gap-3">
                <a href="{{ route('contact.create', ['pole' => $sectorKey]) }}"
                   class="px-5 py-3 rounded-xl font-bold bg-emerald-400 text-slate-950 hover:bg-emerald-300 transition">
                    Demander une cotation pour ce pôle
                </a>
                <a href="{{ route('catalog.index', ['pole' => $sectorKey]) }}"
                   class="px-5 py-3 rounded-xl font-bold bg-white/10 text-white hover:bg-white/20 transition">
                    Voir tous les produits du pôle
                </a>
            </div>
        </div>
    </section>

    <section class="py-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-14">
            <!-- Points forts -->
            <div class="bg-white rounded-3xl border border-slate-200 p-8">
                <h2 class="text-xl font-extrabold text-slate-900 mb-6">Prestations & Garanties TAMAYAZ sur ce pôle</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($pole['highlights'] as $item)
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-emerald-600 text-white flex items-center justify-center font-bold shrink-0">✓</span>
                            <span class="font-semibold text-slate-800 text-sm">{{ $item }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Produits du pôle -->
            <div>
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl font-extrabold text-slate-900">Équipements & Solutions disponibles</h2>
                    <a href="{{ route('catalog.index', ['pole' => $sectorKey]) }}" class="text-sm font-bold text-sky-700 hover:underline">
                        Filtrer dans le catalogue →
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
