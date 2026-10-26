@extends('layouts.admin')

@section('title', 'Demandes de Devis & Contact — Administration TAMAYAZ')
@section('page_title', 'Demandes de Devis & Messages Clients')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.quotes.index') }}"
               class="px-4 py-2 rounded-xl text-xs font-bold uppercase {{ $selectedStatus === '' ? 'bg-sky-700 text-white' : 'bg-white text-slate-700 border border-slate-200' }}">
                Toutes
            </a>
            <a href="{{ route('admin.quotes.index', ['statut' => 'nouveau']) }}"
               class="px-4 py-2 rounded-xl text-xs font-bold uppercase {{ $selectedStatus === 'nouveau' ? 'bg-emerald-600 text-white' : 'bg-white text-slate-700 border border-slate-200' }}">
                Nouvelles
            </a>
            <a href="{{ route('admin.quotes.index', ['statut' => 'en_cours']) }}"
               class="px-4 py-2 rounded-xl text-xs font-bold uppercase {{ $selectedStatus === 'en_cours' ? 'bg-amber-500 text-white' : 'bg-white text-slate-700 border border-slate-200' }}">
                En cours
            </a>
            <a href="{{ route('admin.quotes.index', ['statut' => 'traite']) }}"
               class="px-4 py-2 rounded-xl text-xs font-bold uppercase {{ $selectedStatus === 'traite' ? 'bg-slate-800 text-white' : 'bg-white text-slate-700 border border-slate-200' }}">
                Traitées
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <table class="w-full text-left border-collapse text-sm">
                <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                    <tr>
                        <th class="py-3.5 px-6">Client</th>
                        <th class="py-3.5 px-6">Objet & Pôle</th>
                        <th class="py-3.5 px-6">Contact</th>
                        <th class="py-3.5 px-6">Statut</th>
                        <th class="py-3.5 px-6 text-right">Détails</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse ($quotes as $quote)
                        <tr class="hover:bg-slate-50">
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-900">{{ $quote->full_name }}</div>
                                <div class="text-xs text-slate-500">{{ $quote->company_name ?? 'Particulier / Pro' }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-semibold text-slate-900">{{ $quote->subject }}</div>
                                <div class="text-xs text-slate-500">{{ $quote->sectorLabel() }}</div>
                            </td>
                            <td class="py-4 px-6 text-xs">
                                <div class="font-mono font-bold text-slate-800">{{ $quote->phone }}</div>
                                <div class="text-slate-500">{{ $quote->email }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-1 rounded-full text-xs font-bold {{ $quote->status === 'nouveau' ? 'bg-emerald-100 text-emerald-800' : ($quote->status === 'en_cours' ? 'bg-amber-100 text-amber-800' : 'bg-slate-100 text-slate-700') }}">
                                    {{ $quote->statusLabel() }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <a href="{{ route('admin.quotes.show', $quote) }}" class="text-xs font-bold text-sky-700 hover:underline">Ouvrir →</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-slate-500">Aucune demande trouvée.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div>
            {{ $quotes->links() }}
        </div>
    </div>
@endsection
