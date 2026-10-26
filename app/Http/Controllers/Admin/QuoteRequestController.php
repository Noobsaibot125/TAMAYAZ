<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuoteRequestController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->string('statut')->toString();

        $quotesQuery = QuoteRequest::query()
            ->with('product')
            ->latest();

        if (in_array($status, ['nouveau', 'en_cours', 'traite'], true)) {
            $quotesQuery->where('status', $status);
        }

        $quotes = $quotesQuery->paginate(12)->withQueryString();

        return view('admin.quotes.index', [
            'quotes' => $quotes,
            'selectedStatus' => $status,
        ]);
    }

    public function show(QuoteRequest $quote): View
    {
        $quote->load('product.category');

        return view('admin.quotes.show', [
            'quote' => $quote,
        ]);
    }

    public function update(Request $request, QuoteRequest $quote): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'string', Rule::in(['nouveau', 'en_cours', 'traite'])],
            'admin_notes' => ['nullable', 'string', 'max:3000'],
        ]);

        $quote->update($validated);

        return redirect()
            ->route('admin.quotes.show', $quote)
            ->with('success', 'Le statut de la demande a été mis à jour.');
    }

    public function destroy(QuoteRequest $quote): RedirectResponse
    {
        $quote->delete();

        return redirect()
            ->route('admin.quotes.index')
            ->with('success', 'La demande a été supprimée.');
    }
}
