<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Project;
use App\Models\QuoteRequest;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'products_count' => Product::query()->count(),
            'active_products_count' => Product::query()->active()->count(),
            'categories_count' => Category::query()->count(),
            'projects_count' => Project::query()->count(),
            'quotes_total' => QuoteRequest::query()->count(),
            'quotes_pending' => QuoteRequest::query()->pending()->count(),
        ];

        $recentQuotes = QuoteRequest::query()
            ->with('product')
            ->latest()
            ->take(6)
            ->get();

        $recentProducts = Product::query()
            ->with('category')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', [
            'stats' => $stats,
            'recentQuotes' => $recentQuotes,
            'recentProducts' => $recentProducts,
        ]);
    }
}
