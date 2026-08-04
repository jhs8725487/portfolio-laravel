<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'project_type_id',
        'title',
        'slug',
        'short_description',
        'problem',
        'solution',
        'features',
        'results',
        'challenges',
        'lessons_learned',
        'repo_url',
        'demo_url',
        'video_url',
        'featured',
        'status',
        'published_at',
        'order',
    ];

    protected $casts = [
        'features' => 'array',
        'featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(ProjectType::class, 'project_type_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class)->orderBy('order');
    }

    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class);
    }

    /**
     * Uso: Project::published()->get()
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published')
            ->whereNotNull('published_at');
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('featured', true);
    }

    /**
     * Permite usar el slug en las rutas en vez del id:
     * Route::get('/proyectos/{project}', ...) -> resuelve por slug.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
