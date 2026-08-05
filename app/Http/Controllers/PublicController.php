<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Post;

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

    public function showProject(Project $project)
    {
        abort_unless($project->status === 'published', 404);

        $project->load(['type', 'technologies', 'images']);

        return view('public.project-show', compact('project'));
    }

    public function blog()
{
    $posts = Post::with(['author', 'category', 'tags'])
        ->published()
        ->orderByDesc('published_at')
        ->paginate(9);

    return view('public.blog-index', compact('posts'));
}

public function showPost(Post $post)
{
    abort_unless($post->status === 'published', 404);

    $post->load(['author', 'category', 'tags']);

    return view('public.post-show', compact('post'));
}
}