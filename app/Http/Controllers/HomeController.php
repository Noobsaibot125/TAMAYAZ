<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $categories = Category::query()
            ->active()
            ->withCount(['products' => fn ($query) => $query->active()])
            ->orderBy('sort_order')
            ->get();

        $featuredProducts = Product::query()
            ->active()
            ->featured()
            ->with('category')
            ->latest()
            ->take(6)
            ->get();

        $featuredProjects = Project::query()
            ->featured()
            ->latest('completed_at')
            ->take(3)
            ->get();

        return view('pages.home', [
            'categories' => $categories,
            'featuredProducts' => $featuredProducts,
            'featuredProjects' => $featuredProjects,
            'sectors' => config('tamayaz.sectors'),
        ]);
    }

    public function about(): View
    {
        $projectsCount = Project::query()->count();
        $productsCount = Product::query()->active()->count();

        return view('pages.about', [
            'sectors' => config('tamayaz.sectors'),
            'projectsCount' => $projectsCount,
            'productsCount' => $productsCount,
        ]);
    }
}
