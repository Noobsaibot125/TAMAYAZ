<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Contracts\View\View;

class PoleController extends Controller
{
    public function index(): View
    {
        $categories = Category::query()
            ->active()
            ->withCount(['products' => fn ($query) => $query->active()])
            ->orderBy('sort_order')
            ->get()
            ->groupBy('sector');

        return view('pages.poles.index', [
            'sectors' => config('tamayaz.sectors'),
            'categoriesBySector' => $categories,
        ]);
    }

    public function show(string $sector): View
    {
        $sectors = config('tamayaz.sectors');

        abort_unless(isset($sectors[$sector]), 404);

        $pole = $sectors[$sector];

        $categories = Category::query()
            ->active()
            ->forSector($sector)
            ->withCount(['products' => fn ($query) => $query->active()])
            ->orderBy('sort_order')
            ->get();

        $products = Product::query()
            ->active()
            ->inSector($sector)
            ->with('category')
            ->orderByDesc('is_featured')
            ->latest()
            ->take(6)
            ->get();

        $projects = Project::query()
            ->forSector($sector)
            ->latest('completed_at')
            ->take(3)
            ->get();

        return view('pages.poles.show', [
            'pole' => $pole,
            'sectorKey' => $sector,
            'categories' => $categories,
            'products' => $products,
            'projects' => $projects,
            'allSectors' => $sectors,
        ]);
    }
}
