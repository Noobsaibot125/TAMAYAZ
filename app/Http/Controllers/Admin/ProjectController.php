<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::query()
            ->latest('completed_at')
            ->paginate(10);

        return view('admin.projects.index', [
            'projects' => $projects,
        ]);
    }

    public function create(): View
    {
        return view('admin.projects.create', [
            'sectors' => config('tamayaz.sectors'),
        ]);
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        Project::query()->create($request->safe()->all());

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'La réalisation a été publiée avec succès.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'La réalisation a été supprimée.');
    }
}
