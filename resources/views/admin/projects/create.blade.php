@extends('layouts.admin')

@section('title', 'Nouvelle Réalisation — Administration TAMAYAZ')
@section('page_title', 'Publier une nouvelle réalisation')

@section('content')
    <div class="max-w-3xl bg-white rounded-2xl border border-slate-200 p-6 sm:p-8">
        <form method="POST" action="{{ route('admin.projects.store') }}" class="space-y-5">
            @csrf

            <div>
                <label for="title" class="block text-xs font-bold uppercase text-slate-700 mb-1.5">Titre de la réalisation *</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required
                       class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label for="sector" class="block text-xs font-bold uppercase text-slate-700 mb-1.5">Pôle *</label>
                    <select id="sector" name="sector" required class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm bg-white">
                        @foreach ($sectors as $key => $sector)
                            <option value="{{ $key }}">{{ $sector['short_name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="client_type" class="block text-xs font-bold uppercase text-slate-700 mb-1.5">Type de structure *</label>
                    <input type="text" id="client_type" name="client_type" value="{{ old('client_type', 'Officine de Pharmacie') }}" required
                           class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
                </div>

                <div>
                    <label for="location" class="block text-xs font-bold uppercase text-slate-700 mb-1.5">Localisation *</label>
                    <input type="text" id="location" name="location" value="{{ old('location', 'Cocody, Abidjan') }}" required
                           class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
                </div>
            </div>

            <div>
                <label for="summary" class="block text-xs font-bold uppercase text-slate-700 mb-1.5">Résumé *</label>
                <input type="text" id="summary" name="summary" value="{{ old('summary') }}" required
                       class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
            </div>

            <div>
                <label for="description" class="block text-xs font-bold uppercase text-slate-700 mb-1.5">Description complète *</label>
                <textarea id="description" name="description" rows="4" required
                          class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-center">
                <div>
                    <label for="completed_at" class="block text-xs font-bold uppercase text-slate-700 mb-1.5">Date de livraison</label>
                    <input type="date" id="completed_at" name="completed_at" value="{{ old('completed_at', date('Y-m-d')) }}"
                           class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
                </div>

                <label class="inline-flex items-center gap-2 text-sm font-semibold text-slate-700 pt-4">
                    <input type="checkbox" name="is_featured" value="1" checked class="rounded">
                    <span>Afficher sur la page d'accueil</span>
                </label>
            </div>

            <div class="pt-4 border-t border-slate-200 flex items-center gap-4">
                <button type="submit" class="px-6 py-3 rounded-xl font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition">
                    Publier la réalisation
                </button>
                <a href="{{ route('admin.projects.index') }}" class="text-sm font-semibold text-slate-600 hover:underline">Annuler</a>
            </div>
        </form>
    </div>
@endsection
