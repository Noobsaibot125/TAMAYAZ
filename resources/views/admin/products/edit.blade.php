@extends('layouts.admin')

@section('title', 'Modifier Produit — Administration TAMAYAZ')
@section('page_title', 'Modifier : '.$product->name)

@section('content')
    <div class="max-w-4xl bg-white rounded-2xl border border-slate-200 p-6 sm:p-8">
        <form method="POST" action="{{ route('admin.products.update', $product) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <input type="hidden" name="slug" value="{{ $product->slug }}">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-xs font-bold uppercase text-slate-700 mb-1.5">Nom du produit / équipement *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required
                           class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
                </div>

                <div>
                    <label for="category_id" class="block text-xs font-bold uppercase text-slate-700 mb-1.5">Catégorie *</label>
                    <select id="category_id" name="category_id" required class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm bg-white">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected((int) old('category_id', $product->category_id) === $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="reference" class="block text-xs font-bold uppercase text-slate-700 mb-1.5">Référence (SKU)</label>
                    <input type="text" id="reference" name="reference" value="{{ old('reference', $product->reference) }}"
                           class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
                </div>

                <div>
                    <label for="badge" class="block text-xs font-bold uppercase text-slate-700 mb-1.5">Badge distinctif</label>
                    <input type="text" id="badge" name="badge" value="{{ old('badge', $product->badge) }}"
                           class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
                </div>
            </div>

            <div>
                <label for="short_description" class="block text-xs font-bold uppercase text-slate-700 mb-1.5">Résumé court *</label>
                <input type="text" id="short_description" name="short_description" value="{{ old('short_description', $product->short_description) }}" required
                       class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
            </div>

            <div>
                <label for="description" class="block text-xs font-bold uppercase text-slate-700 mb-1.5">Description détaillée *</label>
                <textarea id="description" name="description" rows="4" required
                          class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                <label class="inline-flex items-center gap-2 text-sm font-semibold text-slate-700">
                    <input type="checkbox" name="in_stock" value="1" @checked($product->in_stock) class="rounded">
                    <span>En stock / Disponible</span>
                </label>
                <label class="inline-flex items-center gap-2 text-sm font-semibold text-slate-700">
                    <input type="checkbox" name="is_featured" value="1" @checked($product->is_featured) class="rounded">
                    <span>Afficher en page d'accueil</span>
                </label>
                <label class="inline-flex items-center gap-2 text-sm font-semibold text-slate-700">
                    <input type="checkbox" name="is_active" value="1" @checked($product->is_active) class="rounded">
                    <span>Publié sur le site</span>
                </label>
            </div>

            <div class="pt-4 border-t border-slate-200 flex items-center gap-4">
                <button type="submit" class="px-6 py-3 rounded-xl font-bold text-white bg-sky-700 hover:bg-sky-800 transition">
                    Enregistrer les modifications
                </button>
                <a href="{{ route('admin.products.index') }}" class="text-sm font-semibold text-slate-600 hover:underline">Annuler</a>
            </div>
        </form>
    </div>
@endsection
