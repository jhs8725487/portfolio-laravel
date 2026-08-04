<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'tagline',
        'email',
        'phone',
        'whatsapp',
        'social_links',
        'meta_description',
    ];

    protected $casts = [
        'social_links' => 'array',
    ];

    /**
     * Devuelve la única fila de configuración, creándola si no existe.
     * Uso en cualquier parte del código: SiteSetting::current()->whatsapp
     */
    public static function current(): self
    {
        return static::firstOrCreate(['id' => 1]);
    }
}
