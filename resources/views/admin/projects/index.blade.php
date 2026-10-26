@extends('layouts.admin')

@section('title', 'Réalisations — Administration TAMAYAZ')
@section('page_title', 'Réalisations & Projets livrés')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <p class="text-sm text-slate-600">Gérez les références clients et chantiers affichés sur le site.</p>
            <a href="{{ route('admin.projects.create') }}"
               class="px-5 py-2.5 rounded-xl text-sm font-bold bg-emerald-600 text-white hover:bg-emerald-700 transition">
                + Ajouter une réalisation
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <table class="w-full text-left border-collapse text-sm">
                <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                    <tr>
                        <th class="py-3.5 px-6">Projet</th>
                        <th class="py-3.5 px-6">Pôle</th>
                        <th class="py-3.5 px-6">Localisation</th>
                        <th class="py-3.5 px-6 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @foreach ($projects as $project)
                        <tr class="hover:bg-slate-50">
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-900">{{ $project->title }}</div>
                                <div class="text-xs text-slate-500">{{ $project->client_type }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-sky-100 text-sky-800">
                                    {{ $project->sectorLabel() }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-slate-600">{{ $project->location }}</td>
                            <td class="py-4 px-6 text-right">
                                <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-bold text-rose-600 hover:underline" onclick="return confirm('Supprimer cette réalisation ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
