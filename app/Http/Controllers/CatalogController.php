<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request): View
    {
        $selectedSector = $request->string('pole')->toString();
        $selectedCategory = $request->string('categorie')->toString();
        $search = $request->string('q')->trim()->toString();

        $categories = Category::query()
            ->active()
            ->withCount(['products' => fn ($query) => $query->active()])
            ->orderBy('sort_order')
            ->get();

        $productsQuery = Product::query()
            ->active()
            ->with('category');

        if (in_array($selectedSector, ['medical', 'mobilier', 'genie_civil'], true)) {
            $productsQuery->inSector($selectedSector);
        }

        if ($selectedCategory !== '') {
            $productsQuery->whereHas('category', function ($query) use ($selectedCategory): void {
                $query->where('slug', $selectedCategory);
            });
        }

        if ($search !== '') {
            $productsQuery->where(function ($query) use ($search): void {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('reference', 'like', "%{$search}%")
                    ->orWhere('short_description', 'like', "%{$search}%");
            });
        }

        $products = $productsQuery
            ->orderByDesc('is_featured')
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('pages.catalog.index', [
            'products' => $products,
            'categories' => $categories,
            'sectors' => config('tamayaz.sectors'),
            'selectedSector' => $selectedSector,
            'selectedCategory' => $selectedCategory,
            'search' => $search,
        ]);
    }

    public function show(Product $product): View
    {
        abort_unless($product->is_active, 404);

        $product->load('category');

        $relatedProducts = Product::query()
            ->active()
            ->where('category_id', $product->category_id)
            ->whereKeyNot($product->id)
            ->with('category')
            ->take(3)
            ->get();

        return view('pages.catalog.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
