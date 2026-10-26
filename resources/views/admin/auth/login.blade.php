<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion Administration — TAMAYAZ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-sky-950 flex items-center justify-center p-4 antialiased">
    <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-8 space-y-6">
        <div class="text-center space-y-2">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-sky-700 to-emerald-600 flex items-center justify-center text-white font-extrabold text-xl">
                    T
                </div>
                <span class="text-2xl font-extrabold text-sky-950">TAMA<span class="text-emerald-600">YAZ</span></span>
            </a>
            <h1 class="text-xl font-bold text-slate-900">Espace d'Administration</h1>
            <p class="text-xs text-slate-500">Connectez-vous pour gérer le catalogue, les réalisations et les devis</p>
        </div>

        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Adresse E-mail</label>
                <input type="email" id="email" name="email" value="{{ old('email', 'admin@tamayaz-ci.com') }}" required autofocus
                       class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
                @error('email')
                    <p class="mt-1 text-xs text-rose-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Mot de passe</label>
                <input type="password" id="password" name="password" required
                       class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-sm">
            </div>

            <div class="flex items-center justify-between text-xs">
                <label class="inline-flex items-center gap-2 text-slate-600">
                    <input type="checkbox" name="remember" class="rounded border-slate-300">
                    <span>Rester connecté</span>
                </label>
                <a href="{{ route('home') }}" class="text-sky-700 font-semibold hover:underline">← Retour au site</a>
            </div>

            <button type="submit" class="w-full py-3 rounded-xl font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition">
                Se connecter
            </button>
        </form>
    </div>
</body>
</html>
