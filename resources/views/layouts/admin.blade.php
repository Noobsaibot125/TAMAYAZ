<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Administration - TAMAYAZ')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900 antialiased">
    <div class="min-h-screen flex flex-col lg:flex-row">
        <!-- Sidebar -->
        <aside class="w-full lg:w-72 bg-sky-950 text-white shrink-0 flex flex-col justify-between">
            <div>
                <div class="p-6 border-b border-sky-900 flex items-center justify-between">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 to-emerald-500 flex items-center justify-center text-white font-bold">
                            T
                        </div>
                        <div>
                            <span class="block text-lg font-extrabold tracking-tight">TAMA<span class="text-emerald-400">YAZ</span></span>
                            <span class="block text-[11px] text-sky-300 uppercase tracking-wider">Back-Office Admin</span>
                        </div>
                    </a>
                </div>

                <nav class="p-4 space-y-1.5">
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-600 text-white shadow-sm' : 'text-sky-100 hover:bg-sky-900' }}">
                        <span>Tableau de bord</span>
                    </a>
                    <a href="{{ route('admin.quotes.index') }}"
                       class="flex items-center justify-between px-4 py-3 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.quotes.*') ? 'bg-emerald-600 text-white shadow-sm' : 'text-sky-100 hover:bg-sky-900' }}">
                        <span>Demandes de Devis</span>
                    </a>
                    <a href="{{ route('admin.products.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.products.*') ? 'bg-emerald-600 text-white shadow-sm' : 'text-sky-100 hover:bg-sky-900' }}">
                        <span>Produits & Équipements</span>
                    </a>
                    <a href="{{ route('admin.projects.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.projects.*') ? 'bg-emerald-600 text-white shadow-sm' : 'text-sky-100 hover:bg-sky-900' }}">
                        <span>Réalisations & Chantiers</span>
                    </a>
                </nav>
            </div>

            <div class="p-4 border-t border-sky-900 space-y-2">
                <a href="{{ route('home') }}" target="_blank" class="block px-4 py-2.5 rounded-xl text-xs font-semibold text-sky-200 hover:bg-sky-900 text-center">
                    ↗ Voir le site public
                </a>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-full px-4 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider bg-rose-600/20 text-rose-200 hover:bg-rose-600 hover:text-white transition">
                        Se déconnecter
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Workspace -->
        <div class="grow flex flex-col">
            <header class="bg-white border-b border-slate-200 px-6 py-4 flex items-center justify-between">
                <h1 class="text-xl font-bold text-slate-900">@yield('page_title', 'Administration TAMAYAZ')</h1>
                <div class="text-sm text-slate-600">
                    Connecté en tant que <strong class="text-slate-900">{{ auth()->user()?->name }}</strong>
                </div>
            </header>

            <main class="p-6 lg:p-8 grow">
                @if (session('success'))
                    <div class="mb-6 rounded-xl bg-emerald-50 border border-emerald-200 p-4 text-sm font-semibold text-emerald-800">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
