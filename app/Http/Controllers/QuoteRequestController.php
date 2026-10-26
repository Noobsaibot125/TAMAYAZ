<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteRequest;
use App\Models\Product;
use App\Models\QuoteRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QuoteRequestController extends Controller
{
    public function create(Request $request): View
    {
        $selectedProduct = null;
        if ($request->filled('produit')) {
            $selectedProduct = Product::query()
                ->active()
                ->with('category')
                ->where('slug', $request->string('produit')->toString())
                ->first();
        }

        $selectedSector = $selectedProduct?->category?->sector
            ?? $request->string('pole', 'medical')->toString();

        if (! in_array($selectedSector, ['medical', 'mobilier', 'genie_civil', 'general'], true)) {
            $selectedSector = 'medical';
        }

        $products = Product::query()
            ->active()
            ->with('category')
            ->orderBy('name')
            ->get();

        return view('pages.contact', [
            'selectedProduct' => $selectedProduct,
            'selectedSector' => $selectedSector,
            'products' => $products,
            'sectors' => config('tamayaz.sectors'),
        ]);
    }

    public function store(StoreQuoteRequest $request): RedirectResponse
    {
        $data = $request->safe()->only([
            'product_id',
            'sector',
            'request_type',
            'full_name',
            'company_name',
            'email',
            'phone',
            'subject',
            'message',
            'quantity',
        ]);

        QuoteRequest::query()->create(array_merge($data, [
            'status' => 'nouveau',
        ]));

        return redirect()
            ->route('contact.create')
            ->with('success', 'Votre demande a bien été transmise à notre service commercial TAMAYAZ. Nous vous recontacterons dans les plus brefs délais.');
    }
}
