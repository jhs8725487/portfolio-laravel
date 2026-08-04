<?php

namespace App\Http\Controllers;

use App\Models\Project;

class PublicController extends Controller
{
    public function home()
    {
        $featuredProjects = Project::with(['type', 'technologies'])
            ->published()
            ->featured()
            ->orderBy('order')
            ->take(3)
            ->get();

        $projects = Project::with(['type', 'technologies'])
            ->published()
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->get();

        return view('public.home', compact('featuredProjects', 'projects'));
    }
}