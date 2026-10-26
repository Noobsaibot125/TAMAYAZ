@extends('layouts.app')

@section('title', 'Nos 3 Pôles d\'Expertise — TAMAYAZ Abidjan')

@section('content')
    <section class="bg-sky-950 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-xs font-bold uppercase tracking-widest text-emerald-400">Savoir-Faire TAMAYAZ</span>
            <h1 class="mt-2 text-3xl sm:text-5xl font-extrabold">Nos 3 Pôles d'Expertise</h1>
            <p class="mt-3 text-sky-100 max-w-3xl text-lg">
                Une offre complète alliant Équipements & Consommables Médicaux, Mobilier spécialisé et Génie Civil pour accompagner vos projets de A à Z.
            </p>
        </div>
    </section>

    <section class="py-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            @foreach ($sectors as $key => $sector)
                <div class="bg-white rounded-3xl border border-slate-200 p-8 lg:p-10 shadow-xs">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                        <div class="lg:col-span-7 space-y-4">
                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold bg-sky-100 text-sky-800">
                                {{ $sector['badge'] }}
                            </span>
                            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">
                                {{ $sector['name'] }}
                            </h2>
                            <p class="text-slate-600 leading-relaxed">
                                {{ $sector['summary'] }}
                            </p>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                                @foreach ($sector['highlights'] as $highlight)
                                    <div class="flex items-start gap-2 text-sm text-slate-700">
                                        <span class="text-emerald-600 font-bold">✓</span>
                                        <span>{{ $highlight }}</span>
                                    </div>
                                @endforeach
                            </div>

                            <div class="pt-4 flex flex-wrap gap-3">
                                <a href="{{ route('poles.show', $key) }}"
                                   class="px-5 py-2.5 rounded-xl text-sm font-bold bg-sky-700 text-white hover:bg-sky-800 transition">
                                    Explorer ce pôle en détail →
                                </a>
                                <a href="{{ route('contact.create', ['pole' => $key]) }}"
                                   class="px-5 py-2.5 rounded-xl text-sm font-bold bg-emerald-50 text-emerald-800 hover:bg-emerald-100 transition">
                                    Demander un devis {{ $sector['short_name'] }}
                                </a>
                            </div>
                        </div>

                        <div class="lg:col-span-5 bg-slate-50 rounded-2xl p-6 border border-slate-200/80">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-4">
                                Catégories rattachées
                            </h3>
                            <div class="space-y-3">
                                @forelse ($categoriesBySector->get($key, collect()) as $category)
                                    <a href="{{ route('catalog.index', ['categorie' => $category->slug]) }}"
                                       class="block p-3.5 rounded-xl bg-white border border-slate-200 hover:border-sky-400 transition flex items-center justify-between">
                                        <div>
                                            <span class="font-bold text-slate-900 text-sm">{{ $category->name }}</span>
                                            <span class="block text-xs text-slate-500">{{ $category->products_count }} référence(s)</span>
                                        </div>
                                        <span class="text-sky-700 font-bold">→</span>
                                    </a>
                                @empty
                                    <p class="text-sm text-slate-500">Consultez notre service commercial pour ce pôle.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
