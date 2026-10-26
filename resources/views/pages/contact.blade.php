@extends('layouts.app')

@section('title', 'Demander un Devis ou Nous Contacter — TAMAYAZ Abidjan')

@section('content')
    <section class="bg-sky-950 text-white py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-xs font-bold uppercase tracking-widest text-emerald-400">Service Commercial & Devis</span>
            <h1 class="mt-2 text-3xl sm:text-5xl font-extrabold">Contactez TAMAYAZ ou Demandez un Devis</h1>
            <p class="mt-3 text-sky-100 max-w-2xl text-base sm:text-lg">
                Notre équipe commerciale à Cocody Riviera Palmeraie vous répond rapidement avec une proposition adaptée à votre pharmacie, infirmerie, clinique ou chantier de génie civil.
            </p>
        </div>
    </section>

    <section class="py-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-8 rounded-2xl bg-emerald-50 border border-emerald-300 p-5 text-emerald-900 font-semibold flex items-center gap-3">
                    <span class="w-8 h-8 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold shrink-0">✓</span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Left Column: Form -->
                <div class="lg:col-span-7 bg-white rounded-3xl border border-slate-200 p-6 sm:p-10 shadow-xs">
                    <h2 class="text-2xl font-extrabold text-slate-900 mb-2">Formulaire de Demande de Cotation / Contact</h2>
                    <p class="text-sm text-slate-600 mb-6">
                        Remplissez les informations ci-dessous. Les champs marqués d'un astérisque (*) sont obligatoires.
                    </p>

                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="request_type" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Type de demande *</label>
                                <select id="request_type" name="request_type" class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm bg-white">
                                    <option value="devis" @selected(old('request_type', 'devis') === 'devis')>Demande de Devis / Proforma</option>
                                    <option value="contact" @selected(old('request_type') === 'contact')>Demande d'information / Rendez-vous</option>
                                </select>
                            </div>

                            <div>
                                <label for="sector" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Pôle concerné *</label>
                                <select id="sector" name="sector" class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm bg-white">
                                    <option value="medical" @selected(old('sector', $selectedSector) === 'medical')>Équipements & Consommables Médicaux</option>
                                    <option value="mobilier" @selected(old('sector', $selectedSector) === 'mobilier')>Mobilier Médical & Professionnel</option>
                                    <option value="genie_civil" @selected(old('sector', $selectedSector) === 'genie_civil')>Génie Civil & Aménagement</option>
                                    <option value="general" @selected(old('sector', $selectedSector) === 'general')>Autre / Demande Générale</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="sm:col-span-2">
                                <label for="product_id" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Équipement ou prestation (optionnel)</label>
                                <select id="product_id" name="product_id" class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm bg-white">
                                    <option value="">— Sélectionner un produit du catalogue (si applicable) —</option>
                                    @foreach ($products as $prod)
                                        <option value="{{ $prod->id }}" @selected((int) old('product_id', $selectedProduct?->id) === $prod->id)>
                                            {{ $prod->name }} ({{ $prod->reference }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="quantity" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Quantité souhaitée</label>
                                <input type="number" id="quantity" name="quantity" min="1" value="{{ old('quantity', $selectedProduct ? 1 : '') }}"
                                       placeholder="Ex: 2"
                                       class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="full_name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Nom & Prénom(s) *</label>
                                <input type="text" id="full_name" name="full_name" required value="{{ old('full_name') }}"
                                       placeholder="Ex: Dr. Kouamé Jean"
                                       class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
                                @error('full_name')
                                    <p class="mt-1 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="company_name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Structure / Pharmacie / Entreprise</label>
                                <input type="text" id="company_name" name="company_name" value="{{ old('company_name') }}"
                                       placeholder="Ex: Pharmacie du Bonheur / Clinique..."
                                       class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Téléphone (Mobile / WhatsApp) *</label>
                                <input type="text" id="phone" name="phone" required value="{{ old('phone') }}"
                                       placeholder="Ex: +225 07 09 01 87 47"
                                       class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
                                @error('phone')
                                    <p class="mt-1 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Adresse E-mail *</label>
                                <input type="email" id="email" name="email" required value="{{ old('email') }}"
                                       placeholder="votre@email.ci"
                                       class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
                                @error('email')
                                    <p class="mt-1 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Objet de la demande *</label>
                            <input type="text" id="subject" name="subject" required
                                   value="{{ old('subject', $selectedProduct ? 'Demande de devis : '.$selectedProduct->name : '') }}"
                                   placeholder="Ex: Équipement complet infirmerie / Devis consommables médicaux"
                                   class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
                            @error('subject')
                                <p class="mt-1 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="message" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Détails de votre besoin *</label>
                            <textarea id="message" name="message" rows="4" required
                                      placeholder="Précisez les équipements souhaités, les quantités, le lieu de livraison ou la nature de vos travaux..."
                                      class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-1 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                                class="w-full py-3.5 px-6 rounded-xl font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-md transition">
                            Envoyer ma demande à TAMAYAZ
                        </button>
                    </form>
                </div>

                <!-- Right Column: Direct Contact Details -->
                <div class="lg:col-span-5 space-y-6">
                    <div class="bg-sky-950 text-white rounded-3xl p-8 space-y-6">
                        <h3 class="text-xl font-extrabold text-emerald-400">Coordonnées Directes — Abidjan</h3>
                        <p class="text-sm text-sky-100 leading-relaxed">
                            Vous souhaitez échanger immédiatement avec notre service commercial ou visiter nos bureaux à Cocody ?
                        </p>

                        <div class="space-y-4 text-sm">
                            <div class="p-4 rounded-2xl bg-white/5 border border-white/10">
                                <span class="block text-xs uppercase tracking-wider text-emerald-300 font-bold">Adresse Géographique</span>
                                <p class="mt-1 font-semibold text-white">
                                    Rue Lumière, Villa 223, Cité du Bonheur<br>
                                    Riviera Palmeraie Sicogi, Cocody<br>
                                    Abidjan — Côte d'Ivoire ({{ config('tamayaz.address.postal_box') }})
                                </p>
                            </div>

                            <div class="p-4 rounded-2xl bg-white/5 border border-white/10">
                                <span class="block text-xs uppercase tracking-wider text-emerald-300 font-bold">Téléphones Service Commercial</span>
                                <a href="tel:{{ config('tamayaz.phones.primary_tel') }}" class="block mt-1 text-lg font-extrabold text-white hover:text-emerald-300">
                                    {{ config('tamayaz.phones.primary') }}
                                </a>
                                <a href="tel:{{ config('tamayaz.phones.secondary_tel') }}" class="block mt-0.5 text-base font-bold text-sky-200 hover:text-white">
                                    {{ config('tamayaz.phones.secondary') }}
                                </a>
                            </div>

                            <div class="p-4 rounded-2xl bg-white/5 border border-white/10">
                                <span class="block text-xs uppercase tracking-wider text-emerald-300 font-bold">Horaires d'ouverture</span>
                                <p class="mt-1 text-sky-100">{{ config('tamayaz.hours.weekdays') }}</p>
                                <p class="text-sky-200">{{ config('tamayaz.hours.saturday') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
