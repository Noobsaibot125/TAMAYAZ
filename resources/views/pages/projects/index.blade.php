@extends('layouts.app')

@section('title', 'Nos Réalisations & Références — TAMAYAZ Abidjan')

@section('content')
    <section class="bg-sky-950 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-xs font-bold uppercase tracking-widest text-emerald-400">Références & Projets Livrés</span>
            <h1 class="mt-2 text-3xl sm:text-5xl font-extrabold">Nos Réalisations en Côte d'Ivoire</h1>
            <p class="mt-3 text-sky-100 max-w-3xl text-lg">
                Découvrez quelques exemples d'équipements de pharmacies, de dotations d'infirmeries et de travaux de génie civil réalisés par les équipes TAMAYAZ.
            </p>
        </div>
    </section>

    <section class="py-14 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <!-- Sector Tabs -->
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('projects.index') }}"
                   class="px-4 py-2 rounded-xl text-sm font-bold transition {{ $selectedSector === '' ? 'bg-sky-700 text-white' : 'bg-white text-slate-700 border border-slate-200 hover:border-sky-400' }}">
                    Toutes les réalisations
                </a>
                @foreach ($sectors as $key => $sector)
                    <a href="{{ route('projects.index', ['pole' => $key]) }}"
                       class="px-4 py-2 rounded-xl text-sm font-bold transition {{ $selectedSector === $key ? 'bg-sky-700 text-white' : 'bg-white text-slate-700 border border-slate-200 hover:border-sky-400' }}">
                        {{ $sector['short_name'] }}
                    </a>
                @endforeach
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($projects as $project)
                    <article class="bg-white rounded-3xl border border-slate-200 overflow-hidden flex flex-col justify-between shadow-xs hover:shadow-lg transition">
                        <div>
                            @if ($project->image_url)
                                <div class="h-52 bg-slate-900 overflow-hidden">
                                    <img src="{{ asset($project->image_url) }}"
                                         alt="{{ $project->title }}"
                                         loading="lazy"
                                         class="w-full h-full object-cover">
                                </div>
                            @endif

                            <div class="p-7 pb-0">
                                <div class="flex items-center justify-between gap-2 text-xs">
                                    <span class="px-3 py-1 rounded-full font-bold bg-sky-100 text-sky-800">
                                        {{ $project->sectorLabel() }}
                                    </span>
                                    <span class="text-slate-500 font-medium">{{ $project->completed_at?->format('m/Y') }}</span>
                                </div>

                                <h2 class="mt-4 text-xl font-extrabold text-slate-900">
                                    {{ $project->title }}
                                </h2>

                                <p class="mt-2 text-xs font-bold uppercase tracking-wider text-emerald-700">
                                    {{ $project->client_type }} • {{ $project->location }}
                                </p>

                                <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                                    {{ $project->description }}
                                </p>
                            </div>
                        </div>

                        <div class="p-7 pt-4 mt-6 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-semibold text-slate-500">Projet livré par TAMAYAZ</span>
                            <a href="{{ route('contact.create', ['pole' => $project->sector]) }}" class="text-xs font-bold text-sky-700 hover:underline">
                                Projet similaire ? →
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $projects->links() }}
            </div>
        </div>
    </section>
@endsection
