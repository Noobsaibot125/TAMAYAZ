<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request): View
    {
        $selectedSector = $request->string('pole')->toString();

        $projectsQuery = Project::query()->latest('completed_at');

        if (in_array($selectedSector, ['medical', 'mobilier', 'genie_civil'], true)) {
            $projectsQuery->forSector($selectedSector);
        }

        $projects = $projectsQuery->paginate(9)->withQueryString();

        return view('pages.projects.index', [
            'projects' => $projects,
            'sectors' => config('tamayaz.sectors'),
            'selectedSector' => $selectedSector,
        ]);
    }
}
