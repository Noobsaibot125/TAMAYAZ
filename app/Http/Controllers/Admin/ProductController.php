<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::query()
            ->with('category')
            ->latest()
            ->paginate(12);

        return view('admin.products.index', [
            'products' => $products,
        ]);
    }

    public function create(): View
    {
        $categories = Category::query()->orderBy('sort_order')->get();

        return view('admin.products.create', [
            'categories' => $categories,
        ]);
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $request->safe()->except(['spec_keys', 'spec_values']);
        $data['specifications'] = $this->extractSpecifications(
            $request->input('spec_keys', []),
            $request->input('spec_values', [])
        );

        Product::query()->create($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Le produit / équipement a été ajouté au catalogue avec succès.');
    }

    public function edit(Product $product): View
    {
        $categories = Category::query()->orderBy('sort_order')->get();

        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $data = $request->safe()->except(['spec_keys', 'spec_values']);
        $data['specifications'] = $this->extractSpecifications(
            $request->input('spec_keys', []),
            $request->input('spec_values', [])
        );

        $product->update($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Le produit a été mis à jour avec succès.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Le produit a été supprimé du catalogue.');
    }

    /**
     * @param  array<int, string|null>  $keys
     * @param  array<int, string|null>  $values
     * @return array<string, string>
     */
    private function extractSpecifications(array $keys, array $values): array
    {
        $specifications = [];

        foreach ($keys as $index => $key) {
            $trimmedKey = trim((string) $key);
            $trimmedValue = trim((string) ($values[$index] ?? ''));

            if ($trimmedKey !== '' && $trimmedValue !== '') {
                $specifications[$trimmedKey] = $trimmedValue;
            }
        }

        return $specifications;
    }
}
