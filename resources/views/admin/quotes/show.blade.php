@extends('layouts.admin')

@section('title', 'Détail Demande #'.$quote->id.' — Administration TAMAYAZ')
@section('page_title', 'Demande de '.$quote->full_name)

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-200 pb-4">
                <div>
                    <span class="text-xs font-bold uppercase text-emerald-600">{{ $quote->sectorLabel() }}</span>
                    <h2 class="text-xl font-extrabold text-slate-900 mt-0.5">{{ $quote->subject }}</h2>
                </div>
                <span class="px-3 py-1 rounded-full text-xs font-bold bg-sky-100 text-sky-800">
                    {{ strtoupper($quote->request_type) }}
                </span>
            </div>

            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                <div class="p-3.5 rounded-xl bg-slate-50">
                    <dt class="text-xs text-slate-500">Nom complet</dt>
                    <dd class="font-bold text-slate-900 mt-0.5">{{ $quote->full_name }}</dd>
                </div>
                <div class="p-3.5 rounded-xl bg-slate-50">
                    <dt class="text-xs text-slate-500">Structure / Entreprise</dt>
                    <dd class="font-bold text-slate-900 mt-0.5">{{ $quote->company_name ?? 'Non précisé' }}</dd>
                </div>
                <div class="p-3.5 rounded-xl bg-slate-50">
                    <dt class="text-xs text-slate-500">Téléphone</dt>
                    <dd class="font-bold text-emerald-700 mt-0.5">
                        <a href="tel:{{ $quote->phone }}">{{ $quote->phone }}</a>
                    </dd>
                </div>
                <div class="p-3.5 rounded-xl bg-slate-50">
                    <dt class="text-xs text-slate-500">Adresse E-mail</dt>
                    <dd class="font-bold text-sky-700 mt-0.5">
                        <a href="mailto:{{ $quote->email }}">{{ $quote->email }}</a>
                    </dd>
                </div>
            </dl>

            @if ($quote->product)
                <div class="p-4 rounded-xl bg-sky-50 border border-sky-200 text-sm">
                    <span class="text-xs font-bold uppercase text-sky-800">Produit sélectionné :</span>
                    <div class="font-bold text-slate-900 mt-0.5">
                        {{ $quote->product->name }} ({{ $quote->product->reference }}) — Quantité : {{ $quote->quantity ?? 1 }}
                    </div>
                </div>
            @endif

            <div>
                <h3 class="text-xs font-bold uppercase text-slate-500 mb-2">Message du client</h3>
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-800 whitespace-pre-line leading-relaxed">{{ $quote->message }}</div>
            </div>
        </div>

        <div class="lg:col-span-5 space-y-6">
            <form method="POST" action="{{ route('admin.quotes.update', $quote) }}" class="bg-white rounded-2xl border border-slate-200 p-6 space-y-4">
                @csrf
                @method('PUT')

                <h3 class="text-base font-bold text-slate-900">Suivi Commercial</h3>

                <div>
                    <label for="status" class="block text-xs font-bold uppercase text-slate-700 mb-1.5">Statut de la demande</label>
                    <select id="status" name="status" class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm bg-white">
                        <option value="nouveau" @selected($quote->status === 'nouveau')>Nouveau</option>
                        <option value="en_cours" @selected($quote->status === 'en_cours')>En cours de traitement</option>
                        <option value="traite" @selected($quote->status === 'traite')>Traité / Devis envoyé</option>
                    </select>
                </div>

                <div>
                    <label for="admin_notes" class="block text-xs font-bold uppercase text-slate-700 mb-1.5">Notes internes</label>
                    <textarea id="admin_notes" name="admin_notes" rows="4"
                              class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">{{ old('admin_notes', $quote->admin_notes) }}</textarea>
                </div>

                <button type="submit" class="w-full py-3 rounded-xl font-bold text-white bg-sky-700 hover:bg-sky-800 transition">
                    Mettre à jour le dossier
                </button>
            </form>

            <form method="POST" action="{{ route('admin.quotes.destroy', $quote) }}">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Supprimer cette demande ?')"
                        class="w-full py-2.5 rounded-xl text-xs font-bold uppercase text-rose-600 border border-rose-200 hover:bg-rose-50 transition">
                    Supprimer la demande
                </button>
            </form>
        </div>
    </div>
@endsection
