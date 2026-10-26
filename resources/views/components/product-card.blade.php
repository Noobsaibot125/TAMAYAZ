@props(['product'])

@php
    $sectorColors = [
        'medical' => 'bg-sky-50 text-sky-700 border-sky-200',
        'mobilier' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
        'genie_civil' => 'bg-amber-50 text-amber-800 border-amber-200',
    ];
    $sectorBgColors = [
        'medical' => 'bg-sky-900',
        'mobilier' => 'bg-emerald-800',
        'genie_civil' => 'bg-slate-800',
    ];
    $sector = $product->category?->sector ?? 'medical';
@endphp

<article {{ $attributes->merge(['class' => 'group bg-white rounded-2xl border border-slate-200/90 shadow-xs hover:shadow-xl hover:border-sky-300 transition-all duration-300 flex flex-col overflow-hidden']) }}>
    <!-- Visual Banner / Image -->
    <div class="relative h-56 {{ $sectorBgColors[$sector] ?? 'bg-sky-900' }} p-5 flex flex-col justify-between overflow-hidden">
        @if ($product->image_url)
            <img src="{{ asset($product->image_url) }}"
                 alt="{{ $product->name }}"
                 loading="lazy"
                 class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-500">
            <div class="absolute inset-0 bg-slate-950/45 group-hover:bg-slate-950/35 transition"></div>
        @endif

        <div class="relative z-10 flex items-center justify-between gap-2">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-white/95 text-slate-900 shadow-xs">
                {{ $product->category?->name ?? 'Équipement TAMAYAZ' }}
            </span>
            @if ($product->badge)
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-400 text-slate-950 shadow-xs">
                    {{ $product->badge }}
                </span>
            @endif
        </div>

        <div class="relative z-10 text-white flex items-end justify-between">
            <div class="bg-slate-950/65 backdrop-blur-xs px-3 py-1.5 rounded-xl">
                @if ($product->reference)
                    <span class="block text-[11px] font-mono uppercase tracking-wider text-sky-200">
                        Réf: {{ $product->reference }}
                    </span>
                @endif
                <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-300">
                    <span class="w-2 h-2 rounded-full {{ $product->in_stock ? 'bg-emerald-400' : 'bg-amber-400' }}"></span>
                    {{ $product->in_stock ? 'Disponible / Sur commande' : 'Sur devis' }}
                </span>
            </div>
        </div>
    </div>

    <!-- Card Body -->
    <div class="p-6 grow flex flex-col justify-between gap-4">
        <div>
            <h3 class="text-lg font-bold text-slate-900 group-hover:text-sky-700 transition line-clamp-2">
                <a href="{{ route('catalog.show', $product) }}">
                    {{ $product->name }}
                </a>
            </h3>
            <p class="mt-2 text-sm text-slate-600 line-clamp-3 leading-relaxed">
                {{ $product->short_description }}
            </p>
        </div>

        <div class="pt-4 border-t border-slate-100 flex items-center justify-between gap-2">
            <a href="{{ route('catalog.show', $product) }}"
               class="text-sm font-bold text-sky-700 hover:text-sky-900 inline-flex items-center gap-1">
                <span>Fiche technique</span>
                <span>→</span>
            </a>

            <a href="{{ route('contact.create', ['produit' => $product->slug]) }}"
               class="inline-flex items-center px-3.5 py-2 rounded-xl text-xs font-bold bg-emerald-600 text-white hover:bg-emerald-700 transition">
                Demander un devis
            </a>
        </div>
    </div>
</article>
