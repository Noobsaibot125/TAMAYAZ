@extends('layouts.app')

@section('title', 'Catalogue Équipements Médicaux, Mobilier & Génie Civil — TAMAYAZ')

@section('content')
    <section class="bg-sky-950 text-white py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-xs font-bold uppercase tracking-widest text-emerald-400">Catalogue Professionnel</span>
            <h1 class="mt-2 text-3xl sm:text-4xl font-extrabold">Équipements Médicaux, Consommables, Mobilier & BTP</h1>
            <p class="mt-2 text-sky-100 max-w-2xl">
                Filtrez nos références par pôle d'activité ou par catégorie et demandez votre cotation personnalisée en quelques clics.
            </p>
        </div>
    </section>

    <section class="py-12 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Search & Pole Filters Bar -->
            <form method="GET" action="{{ route('catalog.index') }}" class="bg-white rounded-2xl border border-slate-200 p-4 sm:p-6 mb-8 shadow-xs">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    <div class="md:col-span-5">
                        <label for="q" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Recherche par mot-clé ou référence</label>
                        <input type="text" id="q" name="q" value="{{ $search }}"
                               placeholder="Ex: Tensiomètre, Autoclave, Lit médicalisé, Pharmacie..."
                               class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-sky-600 focus:outline-none">
                    </div>

                    <div class="md:col-span-3">
                        <label for="pole" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Pôle d'activité</label>
                        <select id="pole" name="pole" class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm bg-white focus:border-sky-600 focus:outline-none">
                            <option value="">Tous les pôles (3)</option>
                            @foreach ($sectors as $key => $sector)
                                <option value="{{ $key }}" @selected($selectedSector === $key)>{{ $sector['short_name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label for="categorie" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Catégorie</label>
                        <select id="categorie" name="categorie" class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm bg-white focus:border-sky-600 focus:outline-none">
                            <option value="">Toutes</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->slug }}" @selected($selectedCategory === $category->slug)>
                                    {{ $category->name }} ({{ $category->products_count }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:col-span-2 flex gap-2">
                        <button type="submit" class="w-full py-2.5 px-4 rounded-xl font-bold text-sm bg-sky-700 text-white hover:bg-sky-800 transition">
                            Filtrer
                        </button>
                        @if ($selectedSector !== '' || $selectedCategory !== '' || $search !== '')
                            <a href="{{ route('catalog.index') }}" class="py-2.5 px-3 rounded-xl font-bold text-sm bg-slate-100 text-slate-700 hover:bg-slate-200 transition" title="Réinitialiser">
                                ✕
                            </a>
                        @endif
                    </div>
                </div>
            </form>

            <!-- Results Grid -->
            @if ($products->isEmpty())
                <div class="bg-white rounded-3xl border border-slate-200 p-12 text-center space-y-4">
                    <h2 class="text-xl font-bold text-slate-900">Aucun produit ne correspond à votre filtre</h2>
                    <p class="text-slate-600 text-sm max-w-md mx-auto">
                        TAMAYAZ dispose d'un large réseau d'approvisionnement médical et mobilier. Contactez-nous directement pour toute référence spécifique.
                    </p>
                    <div class="pt-2 flex justify-center gap-3">
                        <a href="{{ route('catalog.index') }}" class="px-5 py-2.5 rounded-xl text-sm font-bold bg-slate-100 text-slate-800">Voir tout le catalogue</a>
                        <a href="{{ route('contact.create') }}" class="px-5 py-2.5 rounded-xl text-sm font-bold bg-emerald-600 text-white">Demander un produit sur-mesure</a>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>

                <div class="mt-10">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
