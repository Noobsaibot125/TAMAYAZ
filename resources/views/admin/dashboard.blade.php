@extends('layouts.admin')

@section('title', 'Tableau de bord — Administration TAMAYAZ')
@section('page_title', 'Tableau de bord général')

@section('content')
    <div class="space-y-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Demandes Nouvelles</span>
                <div class="mt-2 flex items-baseline justify-between">
                    <span class="text-3xl font-extrabold text-emerald-600">{{ $stats['quotes_pending'] }}</span>
                    <span class="text-xs text-slate-500">sur {{ $stats['quotes_total'] }} au total</span>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Produits au Catalogue</span>
                <div class="mt-2 flex items-baseline justify-between">
                    <span class="text-3xl font-extrabold text-sky-700">{{ $stats['products_count'] }}</span>
                    <span class="text-xs text-emerald-600 font-semibold">{{ $stats['active_products_count'] }} actifs</span>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Catégories Métier</span>
                <div class="mt-2 flex items-baseline justify-between">
                    <span class="text-3xl font-extrabold text-slate-900">{{ $stats['categories_count'] }}</span>
                    <span class="text-xs text-slate-500">3 pôles couverts</span>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Réalisations Publiées</span>
                <div class="mt-2 flex items-baseline justify-between">
                    <span class="text-3xl font-extrabold text-slate-900">{{ $stats['projects_count'] }}</span>
                    <a href="{{ route('admin.projects.create') }}" class="text-xs font-bold text-sky-700 hover:underline">+ Ajouter</a>
                </div>
            </div>
        </div>

        <!-- Recent Quote Requests -->
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <div class="p-6 border-b border-slate-200 flex items-center justify-between">
                <h2 class="text-lg font-bold text-slate-900">Dernières Demandes de Devis & Messages</h2>
                <a href="{{ route('admin.quotes.index') }}" class="text-sm font-bold text-sky-700 hover:underline">Tout voir →</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                        <tr>
                            <th class="py-3.5 px-6">Client / Structure</th>
                            <th class="py-3.5 px-6">Pôle & Objet</th>
                            <th class="py-3.5 px-6">Téléphone</th>
                            <th class="py-3.5 px-6">Statut</th>
                            <th class="py-3.5 px-6 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @forelse ($recentQuotes as $quote)
                            <tr class="hover:bg-slate-50">
                                <td class="py-4 px-6">
                                    <div class="font-bold text-slate-900">{{ $quote->full_name }}</div>
                                    <div class="text-xs text-slate-500">{{ $quote->company_name ?? $quote->email }}</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-semibold text-slate-800">{{ $quote->subject }}</div>
                                    <div class="text-xs text-slate-500">{{ $quote->sectorLabel() }}</div>
                                </td>
                                <td class="py-4 px-6 font-mono text-xs">{{ $quote->phone }}</td>
                                <td class="py-4 px-6">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold {{ $quote->status === 'nouveau' ? 'bg-emerald-100 text-emerald-800' : ($quote->status === 'en_cours' ? 'bg-amber-100 text-amber-800' : 'bg-slate-100 text-slate-700') }}">
                                        {{ $quote->statusLabel() }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <a href="{{ route('admin.quotes.show', $quote) }}" class="text-xs font-bold text-sky-700 hover:underline">Consulter →</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-slate-500">Aucune demande enregistrée.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
