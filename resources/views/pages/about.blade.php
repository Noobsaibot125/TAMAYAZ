@extends('layouts.app')

@section('title', 'À Propos de TAMAYAZ — Équipements Médicaux, Mobilier & Génie Civil à Abidjan')

@section('content')
    <section class="bg-sky-950 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-xs font-bold uppercase tracking-widest text-emerald-400">Qui sommes-nous ?</span>
            <h1 class="mt-2 text-3xl sm:text-5xl font-extrabold">À Propos de TAMAYAZ Côte d'Ivoire</h1>
            <p class="mt-4 text-lg text-sky-100 max-w-3xl">
                Votre partenaire de confiance à Abidjan pour la promotion de consommables et d'équipements médicaux de qualité, le mobilier spécialisé et le génie civil.
            </p>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-12">
            <div class="lg:col-span-7 space-y-6">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">
                    Une vision intégrée au service de la santé et des infrastructures en Côte d'Ivoire
                </h2>
                <p class="text-slate-600 leading-relaxed">
                    <strong>TAMAYAZ</strong> est une entreprise ivoirienne implantée à Cocody Riviera Palmeraie (Cité du Bonheur, Villa 223, Rue Lumière). Nous exerçons dans le domaine de la promotion et de la fourniture de consommables et d'équipements médicaux de très bonne qualité destinés à équiper vos différentes <strong>pharmacies, infirmeries, cliniques et centres de santé</strong>.
                </p>
                <p class="text-slate-600 leading-relaxed">
                    Conscients que la réussite d'un établissement sanitaire ou professionnel repose autant sur la qualité de son bâtiment que sur son agencement et son matériel technique, nous avons structuré notre savoir-faire autour de <strong>trois pôles synergiques</strong> :
                </p>

                <div class="space-y-4 pt-2">
                    @foreach ($sectors as $key => $sector)
                        <div class="p-5 rounded-2xl border border-slate-200 bg-slate-50">
                            <span class="text-xs font-bold uppercase text-emerald-700">{{ $sector['badge'] }}</span>
                            <h3 class="text-lg font-bold text-slate-900 mt-0.5">{{ $sector['name'] }}</h3>
                            <p class="text-sm text-slate-600 mt-1">{{ $sector['summary'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="lg:col-span-5 space-y-6">
                <div class="rounded-3xl bg-slate-900 text-white p-8 space-y-6">
                    <h3 class="text-xl font-bold text-emerald-400">Fiche d'Identité & Coordonnées</h3>

                    <dl class="space-y-4 text-sm">
                        <div class="border-b border-slate-800 pb-3">
                            <dt class="text-slate-400">Raison Sociale</dt>
                            <dd class="font-bold text-white mt-0.5">TAMAYAZ</dd>
                        </div>
                        <div class="border-b border-slate-800 pb-3">
                            <dt class="text-slate-400">Siège Social</dt>
                            <dd class="font-semibold text-white mt-0.5">
                                Rue Lumière, Villa 223, Cité du Bonheur<br>
                                Riviera Palmeraie Sicogi, Cocody — Abidjan, Côte d'Ivoire
                            </dd>
                        </div>
                        <div class="border-b border-slate-800 pb-3">
                            <dt class="text-slate-400">Boîte Postale</dt>
                            <dd class="font-semibold text-white mt-0.5">{{ config('tamayaz.address.postal_box') }}</dd>
                        </div>
                        <div class="border-b border-slate-800 pb-3">
                            <dt class="text-slate-400">Service Commercial</dt>
                            <dd class="font-bold text-emerald-400 mt-0.5">
                                {{ config('tamayaz.phones.primary') }} / {{ config('tamayaz.phones.secondary') }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-slate-400">Horaires d'Ouverture</dt>
                            <dd class="text-slate-200 mt-0.5">
                                {{ config('tamayaz.hours.weekdays') }}<br>
                                {{ config('tamayaz.hours.saturday') }}
                            </dd>
                        </div>
                    </dl>

                    <a href="{{ route('contact.create') }}"
                       class="block w-full py-3.5 rounded-xl text-center font-bold bg-emerald-500 text-slate-950 hover:bg-emerald-400 transition">
                        Prendre Rendez-vous ou Demander un Devis
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
