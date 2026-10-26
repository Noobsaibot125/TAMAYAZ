@extends('layouts.admin')

@section('title', 'Gestion des Produits — Administration TAMAYAZ')
@section('page_title', 'Catalogue Produits & Équipements')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <p class="text-sm text-slate-600">Gérez les équipements médicaux, consommables, mobiliers et offres génie civil.</p>
            <a href="{{ route('admin.products.create') }}"
               class="px-5 py-2.5 rounded-xl text-sm font-bold bg-emerald-600 text-white hover:bg-emerald-700 transition">
                + Ajouter un produit
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                        <tr>
                            <th class="py-3.5 px-6">Produit / Référence</th>
                            <th class="py-3.5 px-6">Catégorie</th>
                            <th class="py-3.5 px-6">Statut</th>
                            <th class="py-3.5 px-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @foreach ($products as $product)
                            <tr class="hover:bg-slate-50">
                                <td class="py-4 px-6">
                                    <div class="font-bold text-slate-900">{{ $product->name }}</div>
                                    <div class="text-xs text-slate-500">Réf: {{ $product->reference ?? 'N/A' }} @if($product->is_featured) • <span class="text-emerald-600 font-semibold">Mis en avant</span> @endif</div>
                                </td>
                                <td class="py-4 px-6 text-slate-700">{{ $product->category?->name }}</td>
                                <td class="py-4 px-6">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold {{ $product->is_active ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-200 text-slate-700' }}">
                                        {{ $product->is_active ? 'Actif' : 'Masqué' }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-right space-x-3">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="text-xs font-bold text-sky-700 hover:underline">Modifier</a>
                                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs font-bold text-rose-600 hover:underline" onclick="return confirm('Supprimer ce produit ?')">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            {{ $products->links() }}
        </div>
    </div>
@endsection
