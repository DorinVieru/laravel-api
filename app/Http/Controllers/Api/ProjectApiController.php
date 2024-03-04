<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;

class ProjectApiController extends Controller
{
    public function index()
    {
        // Recupero i progetti con i dati relativi al tipo e alla tecnologia
        $projects = Project::with('type', 'technologies')->orderBy('id', 'desc')->paginate(6);

        return response() -> json([
            'success' => true,
            'results' => $projects
        ]);
    }
}
